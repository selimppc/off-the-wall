<?php

namespace App\Http\Controllers;

use App\CentralSettings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Country;
use App\UserResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Input;
use Session;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;

class CentralSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function central_settings()
    {
        $pageTitle = " Central Settings";
        if(Auth::user()->type == 'admin'){
            $data = CentralSettings::all();
        }else{
            $data = CentralSettings::where('user_type','user')->get();
        }
        return view('settings.central_settings.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CentralSettings::findOrFail($id);
        return view('settings.central_settings.view', ['data' => $data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CentralSettings::findOrFail($id);
        return view('settings.central_settings.update', ['data' => $data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = CentralSettings::findOrFail($id);
        $m_status=$model->status;
        $input = $request->all();
        $model->status = strtolower($request->status);
        $model->user_type = $request->user_type;
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            if($model->id==2)
            {
                if($m_status != $input['status'])
                {
                    $sender_email_id = DB::table('sender_email')->where('status', '=', 'gmail')->get(array('sender_email.id'));
                    foreach ($sender_email_id as $val) {
                        DB::table('sender_email')->where('id', '=', $val->id)->update(array('max_gmail_send' => $input['status']));
                    }
                }
            }

            $model->save(); // store / update / code here
            // Set session for central Settings
            Session::forget('central_settings');
            $central_settings = CentralSettings::all();
            Session::put('central_settings', $central_settings);
            //commit the changes
            DB::commit();
            Session::flash('flash_message', 'Successfully Edited!');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', "Invalid Request" );
        }
        return redirect()->back();
    }

    public function discounts()
    {
        $id = '2';

        $pageTitle = "Settings";

        $data = CentralSettings::findOrFail($id);
        return view('settings.discounts', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    public function discounts_update(Request $request, $id)
    {
        $model = CentralSettings::findOrFail($id);        
        $input = $request->all();
        $model->status = 'no';
        $model->value = $input['value'];
        $model->canvas_default_width = $input['canvas_default_width'];
        $model->canvas_default_height = $input['canvas_default_height'];
        $model->canvas_base_price = $input['canvas_base_price'];
        $model->canvas_step_price = $input['canvas_step_price'];

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
           

            $model->save(); // store / update / code here
            
            //commit the changes
            DB::commit();
            Session::flash('flash_message', 'Successfully Edited!');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', "Invalid Request" );
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
