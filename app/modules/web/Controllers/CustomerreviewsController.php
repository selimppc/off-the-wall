<?php

namespace App\Modules\Web\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use DB;
use Session;
use Input;

use App\Product;
use App\Customerreviews;

class CustomerreviewsController extends Controller
{

	public function customerreviews(){

		$title = 'Customer reviews';
		$product_id = Product::lists('title','id');

        $all_customer_reviews = DB::table('customer_review')->where('status','active')->orderBy('id','desc')->limit(30)->get();
		return view('web::general.customerreviews', [
            'title'=>$title,
            'product_id' => $product_id,
            'all_customer_reviews' => $all_customer_reviews
        ]);
	}

	public function customerreviewsstore(Request $request){

		$input = $request->all();


		
        $input['status'] = 'Inactive';

        DB::beginTransaction();
        try {
            
            Customerreviews::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();

            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('customer-reviews');
	}

}