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

        $plain_mirror = DB::table('frame_session_data')->where('mac_address',$mac)->where('type','plain_mirror')->orderBy('id','desc')->first();

        if(count($canvas_print) > 0){

            $canvas_array = array(
                'type' => $canvas_print->type,
                'width' => $canvas_print->width,
                'height' => $canvas_print->height,
                'image' => $canvas_print->image,
                'edge_type' => $canvas_print->edge_type,
                'total_price' => $canvas_print->total_price
            );

            // Set Session
            $request->session()->set('photo_frame_canvas_print_cart', $canvas_array);

            $photo_frame_canvas_print_cart = $request->session()->get('photo_frame_canvas_print_cart');

            // Delete Data
            DB::table('frame_session_data')->where('mac_address', $mac)->where('type','canvas_print')->delete(); 
          

        }else{
            $photo_frame_canvas_print_cart = $request->session()->get('photo_frame_canvas_print_cart');
        }


        if (count($plain_mirror) > 0) {
          
            $plain_mirror_array = array(
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
            );

            // Set Session
            $request->session()->set('photo_frame_plain_mirror_cart', $plain_mirror_array);

            $photo_frame_plain_mirror_cart = $request->session()->get('photo_frame_plain_mirror_cart');

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
                'photo_frame_plain_mirror_cart' => $photo_frame_plain_mirror_cart
            ]);
	}
}