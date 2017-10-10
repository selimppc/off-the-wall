<?php

namespace App\Http\Controllers;

use Validator;
use App\CentralSettings;
use App\Country;
use App\PoppedMessageDetail;
use App\PoppedMessageHeader;
use App\Smtp;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Session;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\SenderEmail;
use App\Imap;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Requests\UserRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $model = User::findOrFail($request->id);
            if(isset($input['image']))
            {
                // Images destination
//                $img_dir = "uploads/images/" . date("h-m-y");
                // Create folders if they don't exist
                /*if (!file_exists($img_dir)) {
                    mkdir($img_dir, 0777, true);
                }*/

                $imagefile= Input::file('image');

                $destinationPath = 'uploads/images/';
                $file_original_name = $imagefile->getClientOriginalName();
                $file_name = rand(11111, 99999) . $file_original_name;
                $imagefile->move($destinationPath, $file_name);
                $model->image = 'uploads/images/'.$file_name;
            }
            if($model->save()) {
                try{
                    Mail::send('user.request.activate', array('link' =>$model['remember_token']),

                        function($message) use($input)
                        {
                            $message->from('test@edutechsolutionsbd.com', 'Login Activation Request');
                            $message->to($input['email']);
                            $message->cc('tanvirjahan.tanin@gmail.com', 'Tanin');
                            $message->replyTo('tanintjt.1990@gmail.com','Login Activation Request');
                            $message->subject('Login Activation');
                        });
                }catch(\Exception $e){
                    Session::flash('danger', "Invalid Request! Your message do not send .Please try again.");
                }
            }
            DB::commit();
            Session::flash('flash_message', "Successfully Completed Registration Process.Please Check Your Email For Login Activation Link .");
        }
        catch ( \Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', 'Invalid Request!');
        }
        //return view('user.login.activation_msg');
        return redirect()->back();
    }

    public function user_activation($remember_token)
    {
        $model = User::where('remember_token', $remember_token)->update(['status' => 'active']);

        if(!$remember_token){
            Session::flash('flash_message_error', 'Invalid Confirmation Link.Please Try Again.');
        }
        else{
            Session::flash('flash_message', 'You have been activated successfully for login.');
            return redirect()->route('user-login');
        }
        return redirect()->back();
    }


    public function user_login()
    {
        if(Auth::check()){
            return redirect()->route('user.dashboard');
        }
        else{
            return view('user.login.login')->with('loginLayout', 'loginLayout');
        }
    }

    public function login()
    {
//        Session::flush(); //delete the session

        //get admin email_address
        $admin_email = DB::table('user')->where('type','=','admin')->get(array('user.email'));

        $data = Input::all();
        date_default_timezone_set("Asia/Dacca");
        $date = date('Y-m-d h:i:s', time());

        $user_data = User::where('email', $data['email'])->first();

        if(Auth::check()){
        // echo 'check';exit;
            Session::put('email', isset(Auth::user()->get()->id));

            Session::flash('flash_message', "You Have Already Logged In.");

            return redirect()->route('user.dashboard');
        }else{

            if(isset($user_data->status)?$user_data->status == 'inactive':''){

                Session::flash('flash_message_error', "You are not permitted for login.Your account is in-active.");
            }else{
                try{
                    if (Auth::attempt(['email' => $data['email'], 'password' =>$data['password']]))
                    {
                        Session::put('email', $user_data->email);
                        Session::put('user_type', $user_data->type);
                        Session::flash('flash_message', "Successfully  Logged In.");
                        //mail
                        if($user_data->type == 'user' || 'admin'){
                            $model_cs = CentralSettings::where('title','login-notification')->where('user_type','admin')->first();

                            if($model_cs->status == 'yes'){

                                foreach($admin_email as $email){
                                    Mail::send('user.login.login_msg', array('email'=>$user_data->email,'user_type'=>$user_data->type,'date'=>$date),

                                        function($message) use($user_data,$email)
                                        {
                                            $message->from('test@edutechsolutionsbd.com', 'User System');
                                            $message->to($email->email);
                                            $message->cc('tanintjt@gmail.com', 'Tanin');
                                            $message->replyTo($user_data->email);
                                            $message->subject('User Login Information');
                                        });
                                }
                            }
                        }
                        return redirect()->route('user.dashboard');
                    }else{
                        Session::flash('flash_message_error', "Email Address / Password InCorrect.Please Try Again");
                        return redirect()->back();
                    }
                }catch(\Exception $e){
                    Session::flash('flash_message_error', $e->getMessage());
                    return redirect()->back();
                }
            }
        }return redirect()->back();
    }


    public function logout() {

        Auth::logout();

        Session::flush(); //delete the session
        Session::flash('flash_message', "You are now logged out!");

        return redirect()->route('user-login');
    }


    public function profile()
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $userProfile = User::where('id', '=', $user_id)->first();
            $countryList = [''=>'Please Select'] + Country::lists('title', 'id')->all();
        }
        if($userProfile == Null) {
            Session::flash('info', "User Profile information is missing !");
        }
        return view('user.user_info.index', ['countryList'=> $countryList,'user_id'=>$user_id,'userProfile'=>$userProfile]);
    }

    public function sign_up()
    {
            $countryList = [''=>'Please Select'] + Country::lists('title', 'id')->all();
        return view('user.signup.form', ['countryList'=> $countryList]);
    }



    public function updateProfile(Requests\UserRequest $request, $id)
    {
        $model = User::findOrFail($id);
        $data = $request->all();
        DB::beginTransaction();
        try {
            $model->fill($data)->save();
            DB::commit();
            Session::flash('flash_message', "Successfully  User Profile Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', " Not added.Invalid Request!");
        }
        return redirect()->back();
    }
//user password change--------------------------------------------
    public function password_change_view($id)
    {
        $data = User::findOrFail($id);
        return view('user.user_info.change_password', ['data'=>$data]);
    }

    public function change_user_password_view()
    {
        return view('user.user_info.change_user_password');
    }

    public function update_passwd($id)
    {
        if(Auth::check())
        {
            $input = Input::all();

            if($input['confirm_password']==$input['password']) {

                $hash_check = Hash::check($input['old_password'], User::findOrNew(Auth::user()->id)->password);
                if ($hash_check > 0) {
                    $model = User::findOrNew(Auth::user()->id);
                    $model->password = $input['password'];
                    /* Transaction Start Here */
                    DB::beginTransaction();
                    try {
                        $model->save();

                        DB::commit();
                        Session::flash('flash_message', "Successfully  Password Updated");

                    } catch (Exception $e) {
                        //If there are any exceptions, rollback the transaction
                        DB::rollback();
                        Session::flash('flash_message_error', "Invalid Request");
                    }
                } else {
                    Session::flash('flash_message_error', "Your old password is not correct !");
                }
            }
            else{
                Session::flash('flash_message_error', "Password and Confirm Password Does not match !");
            }
        }
        else
        {
            Session::flash('flash_message_error', "Please Login !" );
        }

        return redirect()->back();
    }
    //user password change end--------------------------------------------



//user profile picture --------------------------------------------------
    public function profile_picture_view()
    {
        $data = User::findOrNew(Auth::user()->id);
        return view('user.user_info.profile_picture_view',['data'=>$data]);
    }
    public function profile_picture_save()
    {
        $model = User::findOrNew(Auth::user()->id);
        $image=Input::file('profile_pic');

        $rules = array('image' => 'required|mimes:png,jpeg,jpg');
        $validator = Validator::make(array('image' => $image), $rules);
        if ($validator->passes()) {
            // Files destination
            $destinationPath = 'uploads/user_image/';
            // Create folders if they don't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image_original_name = $image->getClientOriginalName();
            $file_name = rand(11111, 99999) . $image_original_name;
            $upload_success = $image->move($destinationPath, $file_name);
            $model->image = 'uploads/user_image/'.$file_name;
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                $model->save(); // store / update / code here
                Session::flash('flash_message', "Successfully Profile Picture Added");
                DB::commit();
            }catch (Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', "Invalid Request" );
            }
        } else {
            Session::flash('flash_message_error', 'uploaded file is not valid');
            return redirect()->back();
        }
        return redirect()->back();
    }
//user profile picture end--------------------------------------------------

    public function active_user_login($remember_token)
    {
        return redirect()->route('user-login');
    }
    public function store_signup(Request $request)
    {
        $input = $request->all();
        $user_data = User::where('email', '=', $request->email)->first();
        if ($user_data) {
            Session::flash('flash_message_error', 'This User Already Registered.');
        }
        else {
            if($request->password == $request->confirm_password){

                        $model = new User();
                        $model->first_name = $request->first_name;
                        $model->last_name = $request->last_name;
                        $model->email = $request->email;
                        $model->password = $request->password;
                        $model->address = $request->address;
                        $model->phone_number = $request->phone_number;
                        $model->state = $request->state;
                        $model->country_id = $request->country_id;
                        $model->type = 'user';
                        $model->remember_token = str_random(30);
                        $model->status = 'inactive';
                        if (isset($input['image'])) {
                            // Images destination
                //                $img_dir = "uploads/images/" . date("h-m-y");
                            // Create folders if they don't exist
                            /*if (!file_exists($img_dir)) {
                                mkdir($img_dir, 0777, true);
                            }*/

                            $imagefile = Input::file('image');

                            $destinationPath = 'uploads/images/';
                            $file_original_name = $imagefile->getClientOriginalName();
                            $file_name = rand(11111, 99999) . $file_original_name;
                            $imagefile->move($destinationPath, $file_name);
                            $model->image = 'uploads/images/' . $file_name;
                        }
                        try {
                            DB::beginTransaction();
                            if ($model->save()) {
                                try {
                                    Mail::send('user.request.activate', array('link' => $model['remember_token']),

                                        function ($message) use ($input) {
                                            $message->from('test@edutechsolutionsbd.com', 'Login Activation Request');
                                            $message->to($input['email']);
                                            $message->cc('tanvirjahan.tanin@gmail.com', 'Tanin');
                                            $message->replyTo('tanintjt.1990@gmail.com', 'Login Activation Request');
                                            $message->subject('Login Activation');
                                        });
                                } catch (\Exception $e) {
                                    Session::flash('danger', "Invalid Request! Your message do not send .Please try again.");
                                }
                            }
                            DB::commit();
                            Session::flash('flash_message', "Successfully Completed Registration Process.Please Check Your Email For Login Activation Link .");
                        } catch (\Exception $e) {
                            //If there are any exceptions, rollback the transaction
                            DB::rollback();
                            Session::flash('flash_message_error', 'Invalid Request!');
                        }
    }
            else{
                Session::flash('flash_message_error', 'Confirm password mismatch !');
            }
    }
        return redirect()->back();
    }

    /*public function web_master()
    {
        return view('layout.web_master');
    }*/


}
