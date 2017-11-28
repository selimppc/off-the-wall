<?php
/**
 * Created by PhpStorm.
 * User: sr
 * Date: 12/24/15
 * Time: 11:16 AM
 */

namespace App\Modules\Web\Controllers;

use App\Article;
use App\GalImage;
use App\Media;
use App\SliderImage;
use App\ProductGroup;
use App\Product;
use App\Team;
use App\Widget;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Helpers\ImageResize;
use League\Flysystem\File;
use Illuminate\Support\Facades\Validator;

use Session;
use App\Menu;
use App\MenuType;
use DB;
use App\Events\Event;
use App\Events\MyWidgets;

use Input;


class WwwController extends Controller
{
    public function home_page()
    {

        $title = "Welcome to the";
        $slider_data = SliderImage::where('cat_slider_id', 1)->where('status','active')->get();
        $featured_product_data = Product::where('is_featured','Yes')->where('status','active')->get();

        $home_value = "off-the-wall";
        $data = Article::where('slug', $home_value)->where('status', 'active')->first();

        if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::layout.home_page',[
                'title' => $title,
                'data' => $data,
                'slider_data'=>$slider_data,
                'featured_product_data' => $featured_product_data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
            ]);
    }


    public function about(){
        $slug = 'picture-framer';

        $data = Article::where('slug',$slug)->first();

        if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

    public function termscondition(){
        $slug = 'terms-and-conditions';

        $data = Article::where('slug',$slug)->first();

       if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

    public function privacy(){
        $slug = 'privacy-security';

        $data = Article::where('slug',$slug)->first();

        if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

    public function contact(){
        $slug = 'picture-framing-rockdale';

        $data = Article::where('slug',$slug)->first();

        if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.contact', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

    public function contactsubmit(Request $request){
        
        $input = $request->all();
        
        
        $name = Input::get('name');
        $email = Input::get('email');
        $subject = Input::get('subject');
        $message = Input::get('message');
        $phone = Input::get('phone');              
        
        
        $mail_data = "Name ".$name. "<br/><br/>Email ".$email. "<br/><br/>Subject".$subject. "<br/><br/> Phone".$phone. "<br/><br/> Message".$message;
        
        $to = 'offthewall.frames@hotmail.com';
        $subject = 'Off The Wall Framing | Contact';
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <info@offthewallframing.com.au>' . "\r\n";

        if(mail($to,$subject,$mail_data,$headers)){
            Session::flash('flash_message_success', "Thank you for contacting with us.<br/> We will contact as soon as possible");
        }else{
            Session::flash('flash_message_error', "Your message not send");
        }
        
        return redirect('picture-framing-rockdale');
        
    }
    


    public function emailtofriendstore(Request $request){

        $input = $request->all();

        $email = Input::get('email');
        $subject = Input::get('subject');
        $message = Input::get('message');          
        
        
        $mail_data = $message;
        
        $to = $email;
        $subject = 'Off The Wall Framing | '.$subject;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <info@offthewallframing.com.au>' . "\r\n";

        if(mail($to,$subject,$mail_data,$headers)){
            Session::flash('flash_message_success', "Thank you for sending this product to your friend");
        }else{
            Session::flash('flash_message_error', "Your message not send");
        }
        
        return redirect()->back();

    }



     public function delivery(){
        $slug = 'delivery-installation';

        $data = Article::where('slug',$slug)->first();

        if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

     public function wholesell(){
        $slug = 'wholesale-customers';

        $data = Article::where('slug',$slug)->first();

       if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

         $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

     public function splashbacks(){
        $slug = 'splashbacks';

        $data = Article::where('slug',$slug)->first();

        if(!empty($data->meta_title)){
            $title = $data->meta_title; 
        }else{
            $title =$data->title;
        }

        $meta_keywords = $data->meta_keyword;
        $meta_description = $data->meta_desc;

        return view('web::general.commonpage', [
            'title'=>$title,
            'data'=>$data,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description
        ]);
    }

    public function apps(){

        $title = "Applications";

        return view('web::general.application',[
                'title' => $title
            ]);
    }

    public function apps_photo_upload(){

        $title = "Applications photo upload";

        return view('web::general.photo_upload',[
                'title' => $title
            ]);

    }

    public function phototempstore(Request $request){

        $input = $request->all();
        $image=Input::file('image');

        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'web/temImages/';
            $uploadfolder = 'web/';
            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $filename = md5(microtime() . $image->getClientOriginalName()) . "." . $image->getClientOriginalExtension();
            $upload_file = Input::file('image')->move($destinationPath, $filename);
            
            if($upload_file){
                $request->session()->set('apps_image', $filename);
                return redirect('apps/photo-edit');
            }else{
                 return redirect('apps/photo-upload');
            }
            
        }


    }




    public function photoedit(){

        $title = "Apps photo edit | ";

        return view('web::general.photo_edit',[
                'title' => $title
            ]);

    }

    public function customsize(){

        $title = "Apps custom size | ";

        return view('web::general.custom_size',[
                'title' => $title
            ]);
    }

    public function photoresize(Request $request){

        $data = $_POST['photo'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);

        $photo_name =  time().'.png';

        $destinationPath = 'web/photos/';
        $uploadfolder = 'web/';

        file_put_contents($destinationPath . $photo_name, $data);
        
        //$request->session()->set('modify_img',$photo_name);
        session_start();
        $_SESSION["modify_img"] = $photo_name;
       
        $ajax_response_data = array(
            'status' => "1"
        );
        echo json_encode($ajax_response_data);
        exit;
    }


    public function photoframe(){

        $title = "Photo Frame | ";

        return view('web::general.photoframe',[
                'title' => $title
            ]);
    }


}