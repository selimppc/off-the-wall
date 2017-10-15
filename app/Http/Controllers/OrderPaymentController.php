<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Input;
use Excel;

use App\Customer;
use App\DeliveryDetails;
use App\Orderoverhead;
use App\Orderdetails;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderPaymentController extends Controller{

	public function order_paid_index()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'open')
            ->where('type','product')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_index',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function order_paid_photo_frame()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'open')
            ->where('type','frame')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_photo_frame',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function order_paid_canvas_print()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'open')
            ->where('type','canvas_print')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_canvas_print',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function order_paid_only_print()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'open')
            ->where('type','only_printing')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_only_print',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function order_paid_plain_mirror()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'open')
            ->where('type','plain_mirror')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_plain_mirror',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function order_paid_approved()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'approved')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_approved',['pageTitle' => $pageTitle,'data' => $data]);
    }

    public function order_paid_delivered()
    {

        $pageTitle = "Order";

        $data = Orderoverhead::with('relCustomer')
            ->where('status', 'delivered')
            ->orderBy('order_overhead.id','desc')
            ->get();


        return view('order_payment.order_paid_delivered',['pageTitle' => $pageTitle,'data' => $data]);
    }

     public function order_show($order_head_id){

        $order = Orderoverhead::with('relOrderDetail')->where('id', $order_head_id)->get();
       
        $customer_data = Customer::where('id',$order[0]->user_id)->first();
		
		$delivery_data = DB::table('deliverydetails')->where('user_id',$order[0]->user_id )->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_details',[
            'order_data' => $order,
            'title' => $title,         
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,
			'delivery_data' => $delivery_data
        ]);


    }

    public function order_show_photo_frame($order_head_id){

        $order = Orderoverhead::with('relOrderDetail')->where('id', $order_head_id)->get();
       
        $customer_data = Customer::where('id',$order[0]->user_id)->first();
        
        $delivery_data = DB::table('deliverydetails')->where('user_id',$order[0]->user_id )->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_details_photo_frame',[
            'order_data' => $order,
            'title' => $title,         
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,
            'delivery_data' => $delivery_data
        ]);


    }

    public function order_show_canvas_print($order_head_id){

        $order = Orderoverhead::with('relOrderDetail')->where('id', $order_head_id)->get();
       
        $customer_data = Customer::where('id',$order[0]->user_id)->first();
        
        $delivery_data = DB::table('deliverydetails')->where('user_id',$order[0]->user_id )->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_details_canvas_print',[
            'order_data' => $order,
            'title' => $title,         
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,
            'delivery_data' => $delivery_data
        ]);


    }


    public function order_show_only_print($order_head_id){

        $order = Orderoverhead::with('relOrderDetail')->where('id', $order_head_id)->get();
       
        $customer_data = Customer::where('id',$order[0]->user_id)->first();
        
        $delivery_data = DB::table('deliverydetails')->where('user_id',$order[0]->user_id )->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_details_only_print',[
            'order_data' => $order,
            'title' => $title,         
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,
            'delivery_data' => $delivery_data
        ]);


    }


    public function order_show_plain_mirror($order_head_id){

        $order = Orderoverhead::with('relOrderDetail')->where('id', $order_head_id)->get();
       
        $customer_data = Customer::where('id',$order[0]->user_id)->first();
        
        $delivery_data = DB::table('deliverydetails')->where('user_id',$order[0]->user_id )->orderBy('id','desc')->first();

        $title = 'Invoice Detail';

        return view('order_payment.order_details_plain_mirror',[
            'order_data' => $order,
            'title' => $title,         
            'order_head_id'=>$order_head_id,
            'customer_data' => $customer_data,
            'delivery_data' => $delivery_data
        ]);


    }


     public function approve($id)
    {
       
        try {
            $model = Orderoverhead::where('id',$id)->first();
            $model->status = 'approved';
            if ($model->save()) {

              
                Session::flash('flash_message', " Successfully Saved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

    public function deliverd($id)
    {
       
        try {
            $model = Orderoverhead::where('id',$id)->first();
            $model->status = 'delivered';
            if ($model->save()) {

              
                Session::flash('flash_message', " Successfully Saved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

     public function cancel($id)
    {
       
        try {
            $model = Orderoverhead::where('id',$id)->first();
            $model->status = 'cancel';
            if ($model->save()) {

              
                Session::flash('flash_message', " Successfully Saved.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

    public function order_paid_generate_excel(){

        $title = 'Generate excel';

        return view('generateexcel.index',[
            'title' => $title      
        ]);
    }

    public function generate_excel_current(){

        
        $all_order = Orderdetails::join('order_overhead','order_overhead.id','=','order_details.order_head_id')
                    ->join('product','product.id','=','order_details.product_id')
                    ->leftjoin('product_variation','product_variation.id','=','order_details.product_variation_id')
                    ->join('customer','customer.id','=','order_overhead.user_id')
                    ->select('product.title as Product_name','product_variation.title as Color','order_details.qty as Quantity','order_details.price as Price','customer.first_name as First_name','customer.last_name as Last_name','customer.suburb as Suburb','customer.postcode as Postcode','customer.state as State','customer.telephone as Telephone')
                    ->where('order_overhead.status','open')
                    ->orderBy('order_details.id','desc')
                    ->get();
        
        $success = Excel::create('current_order', function($excel) use($all_order) {
            $excel->sheet('Sheet 1', function($sheet) use($all_order) {
                $sheet->fromArray($all_order);
            });
        })->download('xls');

        $title = 'Generate excel';

        if($success){

            return view('generateexcel.index',[
                'title' => $title      
            ]);

        }
        
    }

    public function generate_excel_approved(){

       
        $all_order = Orderdetails::join('order_overhead','order_overhead.id','=','order_details.order_head_id')
                    ->join('product','product.id','=','order_details.product_id')
                    ->leftjoin('product_variation','product_variation.id','=','order_details.product_variation_id')
                    ->join('customer','customer.id','=','order_overhead.user_id')
                    ->select('product.title as Product_name','product_variation.title as Color','order_details.qty as Quantity','order_details.price as Price','customer.first_name as First_name','customer.last_name as Last_name','customer.suburb as Suburb','customer.postcode as Postcode','customer.state as State','customer.telephone as Telephone')
                    ->where('order_overhead.status','approved')
                    ->orderBy('order_details.id','desc')
                    ->get();
        
        $success = Excel::create('approved_order', function($excel) use($all_order) {
            $excel->sheet('Sheet 1', function($sheet) use($all_order) {
                $sheet->fromArray($all_order);
            });
        })->download('xls');

        $title = 'Generate excel';

        if($success){

            return view('generateexcel.index',[
                'title' => $title      
            ]);

        }
    }


    public function generate_excel_delivered(){

        $all_order = Orderdetails::join('order_overhead','order_overhead.id','=','order_details.order_head_id')
                    ->join('product','product.id','=','order_details.product_id')
                    ->leftjoin('product_variation','product_variation.id','=','order_details.product_variation_id')
                    ->join('customer','customer.id','=','order_overhead.user_id')
                    ->select('product.title as Product_name','product_variation.title as Color','order_details.qty as Quantity','order_details.price as Price','customer.first_name as First_name','customer.last_name as Last_name','customer.suburb as Suburb','customer.postcode as Postcode','customer.state as State','customer.telephone as Telephone')
                    ->where('order_overhead.status','delivered')
                    ->orderBy('order_details.id','desc')
                    ->get();
        
        $success = Excel::create('delivered_order', function($excel) use($all_order) {
            $excel->sheet('Sheet 1', function($sheet) use($all_order) {
                $sheet->fromArray($all_order);
            });
        })->download('xls');

        $title = 'Generate excel';

        if($success){

            return view('generateexcel.index',[
                'title' => $title      
            ]);

        }
    }

}