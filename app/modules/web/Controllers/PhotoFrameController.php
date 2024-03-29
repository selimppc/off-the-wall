<?php
namespace App\Modules\Web\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ImageSize;
use App\FrameCategory;
use App\Mat;
use App\GlassBacking;
use App\Printing;
use App\Article;
use App\CentralSettings;
use App\CanvasEdge;
use App\PlainMirrorFrame;
use Illuminate\Support\Facades\DB;

class PhotoFrameController extends Controller{

	public function photo_frame_2(Request $request)
	{
		$title = "Csutom Photo Frame";	

		$frame_category = FrameCategory::where('status','active')->orderBy('sort_order','ASC')->get();

		$data = ImageSize::where('status','active')->orderBy('sort_order', 'ASC')->get();

		$mat_data = Mat::where('status','active')->get();

		$glass_backing_data = GlassBacking::where('status','active')->get();

		$printing_data = Printing::where('status','active')->get();

		$product_description = Article::where('status','active')->where('id','46')->first();

		$how_to_order = Article::where('status','active')->where('id','47')->first();

		$shipping_rule = Article::where('status','active')->where('id','48')->first();

		return view('web::custom_photo_frame.index',[
                'title' => $title,
                'frame_category' => $frame_category,
                'data' => $data,
                'mat_data' => $mat_data,
                'glass_backing_data' => $glass_backing_data,
                'printing_data' => $printing_data,
                'product_description' => $product_description,
                'how_to_order' => $how_to_order,
                'shipping_rule' => $shipping_rule
            ]);
	}

	public function canvas_print_and_streatch(Request $request){

		$discounts_value = CentralSettings::where('id','2')->first();
		$canvas_edge_r = CanvasEdge::where('status','active')->orderBy('sort_order','asc')->get();

		return view('web::canvas_print_and_streatch.index',[
				'discounts_value' => $discounts_value,
				'canvas_edge_r' => $canvas_edge_r
			]);
	}

	public function custom_plain_mirror(Request $request){


		return view('web::custom_plain_mirror.index');
	}

	public function custom_plain_mirror_frame_it(Request $request){

		$frame_r = PlainMirrorFrame::where('status','active')->get();

		$frame_color_array = array();

		if(count($frame_r) > 0){
			foreach($frame_r as $frame){
				array_push($frame_color_array,trim($frame->frame_color));
			}
		}
    	
    	$frame_color_array = array_unique($frame_color_array);
    	sort($frame_color_array);

    	$mat_data = Mat::where('status','active')->get();

		return view('web::custom_plain_mirror.frame_it',[
				'frame_r' => $frame_r,
				'frame_color_array' => $frame_color_array,
				'mat_data' => $mat_data
			]);
	}

	public function canvas_print_only(Request $request){

		return view('web::canvas_print_only.index');
	}

	public function canvas_stretching_only(Request $request){

		$canvas_edge_r = CanvasEdge::where('status','active')->orderBy('sort_order','asc')->get();

		return view('web::canvas_stretching_only.index',[
				'canvas_edge_r' => $canvas_edge_r
			]);
	}

	public function photo_frame(Request $request){

		/*// Remove Session
        $request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');
        $request->session()->forget('photo_frame_only_printing_cart');*/

		$title = "Photo Frame";

		$data = ImageSize::where('status','active')->orderBy('sort_order', 'ASC')->get();

		$frame_category = FrameCategory::where('status','active')->orderBy('sort_order','ASC')->get();

		$mat_data = Mat::where('status','active')->get();

		$glass_backing_data = GlassBacking::where('status','active')->get();

		$printing_data = Printing::where('status','active')->get();

		$product_description = Article::where('status','active')->where('slug','product-description')->first();

		$how_to_order = Article::where('status','active')->where('slug','how-to-order')->first();

		$shipping_rule = Article::where('status','active')->where('slug','shipping-returns')->first();

		$discounts_value = CentralSettings::where('id','2')->first();

        return view('web::photo_frame.main',[
                'title' => $title,
                'data'  => $data,
                'frame_category' => $frame_category,
                'mat_data' => $mat_data,
                'glass_backing_data' => $glass_backing_data,
                'printing_data' => $printing_data,
                'product_description' => $product_description,
                'how_to_order' => $how_to_order,
                'shipping_rule' => $shipping_rule,
                'discounts_value' => $discounts_value
            ]);

	}

	public function add_to_cart(Request $request){

		// Remove Session
        /*$request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');*/

		if(isset($_POST)){

			// for freight calculation

			$product_cart1 = $request->session()->get('photo_frame_cart');

			$product_cart_2 = array($_POST);

			if($request->session()->has('photo_frame_cart')){				
				$result = array_merge($product_cart1, $product_cart_2);
			}else{
				$result = $product_cart_2;
			}

			$request->session()->set('photo_frame_cart', $result);
			
			/*$request->session()->set('photo_frame_cart', $_POST);*/
			$request->session()->set('photo_frame_type', 'photo_frame');

		}
		
	}

	public function plain_mirror_add_to_cart(Request $request){

		// Remove Session
       /* $request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');*/

		$string=exec('getmac');
		$mac=substr($string, 0, 17);

		DB::table('frame_session_data')->insert([
			'qty' => '1',
			'weight' => '0.5',
			'type' => 'plain_mirror',
			'width' =>  '',
			'height' =>  '',
			'product_type' => $_POST['product_type'],
			'image' =>  $_POST['photo'],
			'total_price' =>  $_POST['total_price_amount'],
			'frame_code' => $_POST['frame_code'],
			'frame_price' => $_POST['frame_price'],
			'backing_type' => $_POST['backing_type'],
			'backing_type_price' => $_POST['backing_type_price'],
			'mac_address' => $mac
		]);
		
	}

	public function canvas_print_add_to_cart(Request $request){

			// Remove Session
	        /*$request->session()->forget('product_cart');
	        $request->session()->forget('photo_frame_cart');
	        $request->session()->forget('photo_frame_plain_mirror_cart');
	        $request->session()->forget('photo_frame_canvas_print_cart');*/
		
			$string=exec('getmac');
			$mac=substr($string, 0, 17);

			DB::table('frame_session_data')->insert([
				'qty' => '1',
				'weight' => '0.5',
				'type' => 'canvas_print',
				'width' =>  $_POST['w'],
				'height' =>  $_POST['h'],
				'image' =>  $_POST['i'],
				'edge_type' =>  $_POST['tr'],
				'total_price' =>  $_POST['tp'],
				'mac_address' => $mac
			]);


	}

	public function only_printing_add_to_cart(Request $request){
		
			$string=exec('getmac');
			$mac=substr($string, 0, 17);

			DB::table('frame_session_data')->insert([
				'qty' => '1',
				'weight' => '0.5',
				'type' => 'stretching',
				'width' =>  $_POST['w'],
				'height' =>  $_POST['h'],
				'edge_type' =>  $_POST['tr'],
				'total_price' =>  $_POST['tp'],
				'mac_address' => $mac
			]);


	}

	public function only_streaching_add_to_cart(Request $request){
		
			$string=exec('getmac');
			$mac=substr($string, 0, 17);

			DB::table('frame_session_data')->insert([
				'qty' => '1',
				'weight' => '0.5',
				'type' => 'only_printing',
				'width' =>  $_POST['w'],
				'height' =>  $_POST['h'],
				'image' =>  $_POST['i'],				
				'total_price' =>  $_POST['tp'],
				'mac_address' => $mac
			]);


	}


	public function canvas_print(Request $request){

		// Remove Session
        /*$request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');
        $request->session()->forget('photo_frame_only_printing_cart');*/

		$title = 'Canvas Print';
		$discounts_value = CentralSettings::where('id','2')->first();
		$canvas_edge_r = CanvasEdge::where('status','active')->orderBy('sort_order','asc')->get();

		return view('web::photo_frame.canvas_print.main',[
                'title' => $title,
                'discounts_value' => $discounts_value,
                'canvas_edge_r' => $canvas_edge_r
            ]); 
	}


	public function only_printing(Request $request){

		// Remove Session
       /* $request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');
        $request->session()->forget('photo_frame_only_printing_cart');*/

		$title = 'Canvas Print';
		$discounts_value = CentralSettings::where('id','2')->first();
		$canvas_edge_r = CanvasEdge::where('status','active')->orderBy('sort_order','asc')->get();

		return view('web::photo_frame.canvas_stretching.main',[
                'title' => $title,
                'discounts_value' => $discounts_value,
                'canvas_edge_r' => $canvas_edge_r
            ]); 

	}

	public function canvas_stretching(Request $request){

		// Remove Session
        /*$request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');
        $request->session()->forget('photo_frame_only_printing_cart');*/

		$title = 'Canvas Print';
		$discounts_value = CentralSettings::where('id','2')->first();
		$canvas_edge_r = CanvasEdge::where('status','active')->orderBy('sort_order','asc')->get();

		return view('web::photo_frame.only_printing.main',[
                'title' => $title,
                'discounts_value' => $discounts_value,
                'canvas_edge_r' => $canvas_edge_r
            ]); 
	}

	public function plain_mirror(Request $request){

		// Remove Session
       /* $request->session()->forget('product_cart');
        $request->session()->forget('photo_frame_cart');
        $request->session()->forget('photo_frame_plain_mirror_cart');
        $request->session()->forget('photo_frame_canvas_print_cart');
        $request->session()->forget('photo_frame_only_printing_cart');*/

		$title = 'Plain Mirror';

		$discounts_value = CentralSettings::where('id','2')->first();

		return view('web::photo_frame.plain_mirror.main',[
                'title' => $title,
                'discounts_value' => $discounts_value
            ]); 
	}

	public function plain_mirror_frame_it(){

		$title = 'Plain Mirror';

		$frame_r = PlainMirrorFrame::where('status','active')->get();

		$frame_color_array = array();

		if(count($frame_r) > 0){
			foreach($frame_r as $frame){
				array_push($frame_color_array,trim($frame->frame_color));
			}
		}
    	
    	sort($frame_color_array);

		return view('web::photo_frame.plain_mirror.main_frame_it',[
                'title' => $title,
                'frame_r' => $frame_r,
                'frame_color_array' => array_unique($frame_color_array)
            ]); 

	}
}