<?php

namespace App\Modules\Web\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\ProductGroup;
use DB;


class CartController extends Controller
{

	public function mycart(Request $request){
/*$string=exec('getmac');
$mac=substr($string, 0, 17); 
echo $mac;

    dd("OK");exit();*/

        $string=exec('getmac');
        $mac=substr($string, 0, 17);

        $canvas_print = DB::table('frame_session_data')->where('mac_address',$mac)->where('type','canvas_print')->orderBy('id','desc')->first();

        $only_printing = DB::table('frame_session_data')->where('mac_address',$mac)->where('type','stretching')->orderBy('id','desc')->first();

        $only_stretching = DB::table('frame_session_data')->where('mac_address',$mac)->where('type','only_printing')->orderBy('id','desc')->first();

        $plain_mirror = DB::table('frame_session_data')->where('mac_address',$mac)->where('type','plain_mirror')->orderBy('id','desc')->first();

        if(count($canvas_print) > 0){

            $product_cart1 = $request->session()->get('photo_frame_canvas_print_cart');

            $product_cart_2 = array( 
                array(
                    'qty' => $canvas_print->qty,
                    'weight' => $canvas_print->weight,
                    'type' => $canvas_print->type,
                    'width' => $canvas_print->width,
                    'height' => $canvas_print->height,
                    'image' => $canvas_print->image,
                    'edge_type' => $canvas_print->edge_type,
                    'total_price' => $canvas_print->total_price
                ) 
            );


            if($request->session()->has('photo_frame_canvas_print_cart')){

                $photo_frame_canvas_print_cart = array_merge($product_cart1, $product_cart_2);
            }else{
                $photo_frame_canvas_print_cart = $product_cart_2;
            }

            $request->session()->set('photo_frame_canvas_print_cart', $photo_frame_canvas_print_cart);
 
            // Delete Data
            DB::table('frame_session_data')->where('mac_address', $mac)->where('type','canvas_print')->delete(); 
          

        }else{
            $photo_frame_canvas_print_cart = $request->session()->get('photo_frame_canvas_print_cart');
        }

        // Only Printing
        if(count($only_stretching) > 0){

            $product_cart1 = $request->session()->get('photo_frame_only_stretching_cart');

            $product_cart_2 = array( 
                array(
                    'qty' => $only_stretching->qty,
                    'weight' => $only_stretching->weight,
                    'type' => $only_stretching->type,
                    'width' => $only_stretching->width,
                    'height' => $only_stretching->height,
                    'image' => $only_stretching->image,
                    'total_price' => $only_stretching->total_price
                )
            );


            if($request->session()->has('photo_frame_only_stretching_cart')){

                $photo_frame_only_stretching_cart = array_merge($product_cart1, $product_cart_2);
            }else{
                $photo_frame_only_stretching_cart = $product_cart_2;
            }


            $request->session()->set('photo_frame_only_stretching_cart', $photo_frame_only_stretching_cart);

            // Delete Data
            DB::table('frame_session_data')->where('mac_address', $mac)->where('type','only_printing')->delete(); 
          

        }else{
            $photo_frame_only_stretching_cart = $request->session()->get('photo_frame_only_stretching_cart');
        }



        // Only Streaching
        if(count($only_printing) > 0){

            $product_cart1 = $request->session()->get('photo_frame_only_printing_cart');

            $product_cart_2 = array( 
                array(
                    'qty' => $only_printing->qty,
                    'weight' => $only_printing->weight,
                    'type' => $only_printing->type,
                    'width' => $only_printing->width,
                    'height' => $only_printing->height,
                    'edge_type' => $only_printing->edge_type,
                    'total_price' => $only_printing->total_price
                )
            );

           
           if($request->session()->has('photo_frame_only_printing_cart')){

                $photo_frame_only_printing_cart = array_merge($product_cart1, $product_cart_2);
            }else{
                $photo_frame_only_printing_cart = $product_cart_2;
            }

            // Set Session
            $request->session()->set('photo_frame_only_printing_cart', $photo_frame_only_printing_cart);

            // Delete Data
            DB::table('frame_session_data')->where('mac_address', $mac)->where('type','stretching')->delete(); 
          

        }else{
            $photo_frame_only_printing_cart = $request->session()->get('photo_frame_only_printing_cart');
        }



        if (count($plain_mirror) > 0) {
          
            $product_cart1 = $request->session()->get('photo_frame_plain_mirror_cart');

            $product_cart_2 = array( 
                array(
                    'qty' => $plain_mirror->qty,
                    'weight' => $plain_mirror->weight,
                    'type' => $plain_mirror->type,
                    'width' => $plain_mirror->width,
                    'height' => $plain_mirror->height,
                    'image' => $plain_mirror->image,
                    'total_price' => $plain_mirror->total_price,
                    'product_type' => $plain_mirror->product_type,
                    'frame_code' => $plain_mirror->frame_code,
                    'frame_price' => $plain_mirror->frame_price,
                    'backing_type' => $plain_mirror->backing_type,
                    'backing_type_price' => $plain_mirror->backing_type_price
                )
            );

            if($request->session()->has('photo_frame_plain_mirror_cart')){

                $photo_frame_plain_mirror_cart = array_merge($product_cart1, $product_cart_2);
            }else{
                $photo_frame_plain_mirror_cart = $product_cart_2;
            }

            // Set Session
            $request->session()->set('photo_frame_plain_mirror_cart', $photo_frame_plain_mirror_cart);

            // Delete Data
            DB::table('frame_session_data')->where('mac_address', $mac)->where('type','plain_mirror')->delete(); 


        }else{
            $photo_frame_plain_mirror_cart = $request->session()->get('photo_frame_plain_mirror_cart');
        }
        



		$title ="mycart";

        $product_cart = $request->session()->get('product_cart');

        $photo_frame_cart = $request->session()->get('photo_frame_cart');


        return view('web::cart.cart1',[
                'title' => $title,
                'product_cart_r' => $product_cart,
                'photo_frame_cart' => $photo_frame_cart,
                'photo_frame_canvas_print_cart' => $photo_frame_canvas_print_cart,
                'photo_frame_plain_mirror_cart' => $photo_frame_plain_mirror_cart,
                'photo_frame_only_printing_cart' => $photo_frame_only_printing_cart,
                'photo_frame_only_stretching_cart' => $photo_frame_only_stretching_cart 
            ]);
	}
}