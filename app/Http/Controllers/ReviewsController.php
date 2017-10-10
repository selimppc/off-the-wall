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

use App\Customerreviews;

class ReviewsController extends Controller{

	public function all_list(){

		$pageTitle = "Reviews";

		$data = Customerreviews::orderBy('id', 'DESC')->paginate(20);

		return view('reviews.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
	}

	public function confirm(Request $request,$id){

		$model = Customerreviews::where('id',$id)->first();
        $input = $request->all();

        $input['status'] = 'active';

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('all-list');
	}

     public function delete($id)
    {
        try {
            $model = Customerreviews::where('id',$id)->first();
            if ($model->delete()) {               
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

}