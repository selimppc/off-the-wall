<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use App\UserResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Input;
use Session;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    /* Invitation */
    public function request()
    {
        return view('user.request._form');
    }

    public function user_request_mail(Request $request)
    {
        $user =  Auth::user()->id;
        $email = $request->email;
        $type = $request->type;
        $user_data = User::where('email','=',$email)->first();
        if($user_data){
            Session::flash('flash_message_error','This User Already Invited.');
        }else{
            if($email){
                $input_data = [
                    'email'=>$email,
                    'remember_token'=> str_random(30),
                    'status'=> 'invited',
                    'type'=> $type,
                ];
                $model =  new User();
                if($model->create($input_data)) {
                    try{
                        Mail::send('user.request.mail_message', array('link' =>$input_data['remember_token'],'type'=>$type),
                            function($message) use ($email)
                            {
                                $message->from('test@edutechsolutionsbd.com', 'User Signup Request');
                                $message->to($email);
//                                $message->cc('tanvirjahan.tanin@gmail.com', 'Tanin');
                                $message->replyTo('tanintjt.1990@gmail.com','User Signup Request');
                                $message->subject('MemberShip Request');
                            });
                    }catch(\Exception $e){
                        Session::flash('danger', "Invalid Request! Your message do not send .Please try again.");
                    }
                }
                Session::flash('flash_message', " Successfully Send Email For MemberShip Request .");
            }else{
                Session::flash('danger', 'The Specified Email address Is not Listed On Your Account. Please Try Again.');
            }
        }
        return redirect()->back();
    }

    public function user_confirm($remember_token)
    {

        $countryList = [''=>'Please Select'] + Country::lists('title', 'id')->all();
        $user = User::where('remember_token','=',$remember_token)->first();

        if(!$user){
            Session::flash('flash_message_error', 'Invalid Confirmation Link.Please Try Again.');
        }
        else{
            return view('user.signup.index', ['countryList'=> $countryList,'user_id'=>$user->id, 'email' => $user->email]);
        }
        return redirect()->back();
    }

    // User Status Change.........

    public function status_inactive($id)
    {
        $model = User::findOrFail($id);
        //$input = Input::all();
        $input_data = Input::all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try{
            $model->status = "inactive";

            $model->update($input_data);

            DB::commit();
            Session::flash('flash_message', 'Successfully Changed Status!');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', "Failed !" );
        }
        return redirect()->route('user.user-list');
    }

    public function status_active($id)
    {

        $model = User::findOrFail($id);
        $input_data = Input::all();

        $user = User::where('id','=',$id)->first();

        /* Transaction Start Here */
        DB::beginTransaction();
        if($user->password && $user->status == 'inactive'){
            try{
                $model->status = "active";

                $model->update($input_data);

                Mail::send('user.user_info.status_activation_msg', array('link' =>$model->remember_token),
                    function($message) use($model)
                    {
                        $message->from('test@edutechsolutionsbd.com', 'User Activation Mail');
                        $message->to($model->email);
                        $message->cc('tanintjt@gmail.com', 'Tanin');
                        $message->replyTo($model->email);
                        $message->subject('You have been activated by admin');
                    });

                DB::commit();
                Session::flash('flash_message', 'Successfully Changed Status!');
            }catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', "Failed !" );
            }
        }else{
            Session::flash('flash_message_error', "Password is not set by  the user !" );
        }

        return redirect()->route('user.user-list');
    }

    /** User List    **/
    public function user_list(){

        if(Auth::user()->type == 'admin'){

            $countryList = [''=>'Please Select'] + Country::lists('title', 'id')->all();
            $user_data = User::with('relCountry')->where('user.id', '!=', Auth::user()->id)->paginate(10);
            return view('user.user_info.user_list',['user_data'=>$user_data,'countryList'=>$countryList]);
        }else{
            Session::flash('flash_message_error','Invalid Request! You do not access to this url.');
            return redirect()->route('user.dashboard');
        }
    }

    public function create_new_user(Request $request){

        // Validate the request...
        $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|unique:user',
            'first_name' => 'required',
            'type' => 'required',
        ]);
        $data = $request->all();

        $model = new User();
        $model->first_name =  $request->first_name;
        $model->last_name =  $request->last_name;
        $model->email =  $request->email;
        $model->address =  $request->address;
        $model->phone_number =  $request->phone_number;
        $model->state =  $request->state;
        $model->country_id =  $request->country_id;
        $model->type =  $request->type;
        $model->remember_token = str_random(30);
        $model->status =  'inactive';
        DB::beginTransaction();
        try{
            if($model->fill($data)->save()){
                if( $model->status == 'inactive'){
                    try{
                        Mail::send('user.admin.pwd_generate_mail', array('link' =>$model->remember_token),
                            function($message) use($model)
                            {
                                $message->from('test@edutechsolutionsbd.com', 'User Password Generation');
                                $message->to($model->email);
                                $message->cc('shajjadhossin81@gmail.com', 'Shajjad');
                                $message->replyTo('shajjadhossain81@gmail.com','forgot password Request');
                                $message->subject('User Password Generation');
                            });
                    }catch(\Exception $e ){
                        Session::flash('flash_message_error', 'Your Email Do Not Send.Please Try Again');
                    }
                }
                DB::commit();
                Session::flash('flash_message', "Successfully  Added User.");
            }else{
                Session::flash('flash_message_error', "Data Do Not Saved");
            }
        }
        catch(\Exception $e){
            DB::rollback();
            Session::flash('flash_message_error', " Not added.Invalid Request!");
        }
        return redirect()->back();
    }

    public function create($id)
    {
        $user_data = User::with('relCountry')->findOrFail($id);
        $countryList = [''=>'Please Select'] + Country::lists('title', 'id')->all();
        return view('user.admin._create',['user_data'=>$user_data,'countryList'=>$countryList]);
    }


    public function forgot_password()
    {
        return view('user.forgot_password.email_form');
    }

    public function user_password_reminder_mail()
    {
        $email = Input::get('email');

        $user_exists = DB::table('user')->where('email', '=', $email)->exists();

        if($user_exists){
            $user = DB::table('user')->where('email', '=', $email)->first();

            $model = new UserResetPassword();
            $model->user_id = $user->id;
            $model->reset_password_token = str_random(30);
            $token = $model->reset_password_token;
            $model->reset_password_expire = date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s', time())) + (60 * 30)));
            $model->reset_password_time = date('Y-m-d h:i:s', time());
            $model->status = 2;

            //print_r($model);exit;

            if($model->save()) {
                try{
                    Mail::send('user.forgot_password.email_notification', array('link' =>$token),
                        function($message) use ($user)
                        {
                            $message->from('test@edutechsolutionsbd.com', 'User Password Set Notification');
                            //$message->from('tanintjt.1990@gmail.com', 'AFFIFACT');
                            $message->to($user->email);
                            $message->cc('tanintjt@gmail.com', 'Tanin');
                            $message->replyTo('shajjadhossain81@gmail.com','forgot password Request');
                            $message->subject('Forgot Password Reset Mail');
                        });
                    Session::flash('flash_message', 'Sent email to reset password. Please check your email!');
                }catch (\Exception $e){
                    Session::flash('flash_message_error', 'Email does not Send!');
                }
            }else{
                Session::flash('flash_message_error', 'Does not Save!');
            }
        }else{
            Session::flash('flash_message_error', 'The Specified Email address Is not Listed On Your Account. Please Try Again.');
        }
        return redirect()->back();
    }

    public function user_password_reset_confirm($reset_password_token)
    {
        $user = UserResetPassword::where('reset_password_token','=',$reset_password_token)->first();
        $current_time = date('Y-m-d h:i:s', time());

        if(isset($user)) {
            $data = [
                isset($user->id) ? 'user_id': '' => isset($user->id) ? $user->id : '',
                'reset_password_expire' => isset($user) ? $user->reset_password_expire : '',
                'reset_password_time'=> isset($user) ? $user->reset_password_time : '',
                'status'=> isset($user) ? $user->status : '',
            ];
            if ($data['reset_password_expire'] > $current_time && $data['status'] == 2) {
                $id =  isset($user->id) ?$data['user_id']:'';
                return view('user.forgot_password.reset_password_form',['id'=>$id]);
            }
            if($data['reset_password_expire'] < $current_time){
                Session::flash('flash_message_error', 'Time Expired.Please Try Again.');
                return redirect()->back();
            }
            if($data['status'] == 0) {
                Session::flash('flash_message_error', 'You can Not Access To This link.Please Try Again.');
                return redirect()->back();
            }
        }else{
            Session::flash('flash_message_error', 'Invalid Password Reset Link.Please Try Again.');
            return redirect()->back();
        }
        return redirect()->back();
    }

    // forgot password: get new password action:update
    public function save_new_password(Requests\UserResetPassword $request)
    {
        $data = $request->all();
        $id = $data['id'];
//        print_r($id);exit;
        $user_id = DB::table('user_reset_password')->where('id', '=', $id)->first();

        $model = User::findOrFail($user_id->user_id);
            DB::beginTransaction();
            try {
                //update status and password
                if($model->fill($data)->save()){
                    DB::table('user_reset_password')->where('user_id', '=', $user_id->user_id)->update(array('status' => 0));
                }
                DB::commit();
                Session::flash('flash_message','You have reset your password successfully. You may signin now.');
                return redirect()->route('user-login');
            }
            catch ( \Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('flash_message_error', "Invalid Request! Please Try Again.");
            }
//            return redirect()->back();
    }

    public function show($id)
    {
        $pageTitle = 'Show User detail';
        $data = User::with('relCountry')->findOrFail($id);
        return view('user.user_info.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }
//    Change User Information BY Admin......
    public function edit($id)
    {
        $countryList = [''=>'Please Select'] + Country::lists('title', 'id')->all();
        $data = User::with('relCountry')->findOrFail($id);
        return view('user.user_info.update', ['data'=>$data,'countryList'=> $countryList,'id'=>$id]);

    }

    public function update(Requests\UserRequest $request, $id)
    {
        $user_status = User::where('id','=',$id)->first()->status;
        $data = $request->all();

        $model = User::findOrFail($id);

        DB::beginTransaction();

        if($model->fill($data)->save()){
            if( $user_status == 'invited'){
                try{
                    Mail::send('user.admin.pwd_generate_mail', array('link' =>$model->remember_token),
                        function($message) use($model)
                        {
                            $message->from('tanintjt@gmail.com', 'User Password Generation');
                            $message->to($model->email);
                            $message->cc('tanintjt@gmail.com', 'Tanin');
                            $message->subject('User Password Generation');
                        });
                }catch(\Exception $e ){
                    Session::flash('flash_message_error', 'Your Email Do Not Send.Please Try Again');
                }
            }
            DB::commit();
            Session::flash('flash_message', "Successfully  Updated.");
        }else{
            Session::flash('flash_message_error', "Data Do Not Saved");
        }
        return redirect()->back();
    }

    public function generate_password($remember_token)
    {
        $model_exists = User::where('remember_token', $remember_token)->exists();

        if(!$model_exists){
            Session::flash('flash_message_error', 'Invalid Request.');
        }
        else{
            $user_id = DB::table('user')->where('remember_token', '=', $remember_token)->first()->id;

            Session::flash('flash_message', 'You have successfully a registered user.You can generate your password now.');
            return view('user.user_info.generate_pwd',['user_id'=>$user_id]);
        }
        return redirect()->back();
    }

    public function save_password(Requests\UserResetPassword $request){

        $data = $request->all();
        $id = $data['id'];

        $model = User::findOrFail($id);
        DB::beginTransaction();
        try {
            //update status and password
            if($model->fill($data)->save()){
                DB::table('user')->where('id', '=', $id)->update(array('status' => 'active'));
            }
            DB::commit();
            Session::flash('flash_message','You have been successfully generated your password . You may signin now.');
            return redirect()->route('user-login');
        }
        catch ( \Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', "Invalid Request! Please Try Again.");
        }
    }

    public function destroy($id)
    {
        $model_user = User::findOrFail($id);
        $flag=UserResetPassword::where('user_id','=',$id)->exists();
        if($model_user->type=='admin')
        {
            Session::flash('flash_message_error', "You are not allowed to delete any admin.");
            return redirect()->route('user.user-list');
        }
        else
        {
            if($flag !='')
            {
                try {

                    if (UserResetPassword::where('user_id', '=', $id)->delete(array('user_reset_password.id'))) {
                        if ($model_user->delete()) {
                            Session::flash('flash_message', " Successfully Deleted.");
                            return redirect()->route('user.user-list');

                        } else {
                            Session::flash('flash_message_error', " Invalid Delete Process ! please try again !!!");
                            return redirect()->back();
                        }
                    } else {
                        Session::flash('flash_message_error', " Invalid Delete Process ! please try again4 !!!");
                        return redirect()->back();
                    }
                } catch (\Exception $ex) {
                    Session::flash('flash_message_error', 'Invalid Delete Process ! please try again !!!');
                    return redirect()->route('user.user-list');
                }
            }
            else
            {
                try {
                    if ($model_user->delete()) {
                        Session::flash('flash_message', " Successfully Deleted.");
                        return redirect()->route('user.user-list');

                    }
                } catch(\Exception $ex) {
                    Session::flash('flash_message_error', " Invalid Delete Process ! please try again !!!");
                    return redirect()->back();
                }
            }
        }
    }
}


