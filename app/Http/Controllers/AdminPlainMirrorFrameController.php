<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;


use App\PlainMirrorFrame;

class AdminPlainMirrorFrameController extends Controller{

	public function index()
	{

        $data = PlainMirrorFrame::orderBy('id', 'DESC')->paginate(30);

        $pageTitle = "Plain Mirror Frame";
        
        return view('plain_mirror.index', [
                    'data' => $data,
                    'pageTitle'=> $pageTitle
        ]);
	}

	public function store(Requests\PlainMirrorFrameRequest $request)
    {
    	$input = $request->all();

    	$frame = PlainMirrorFrame::where('frame_code',$input['frame_code'])->exists();

        $image=Input::file('image_link');
        $thumb_link=Input::file('thumb_link');
        

        // for frame show
        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'web/photo_frame/plain_mirror/images/frame_images/top_frame/';

            
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = $this->image_upload($image, $file_type_required, $destinationPath);

            if ($file_name != '') {
                if(!empty($model->image_link)){
                    @unlink(public_path()."/".$model->image_link);    
                }                
                
                $input['image_link'] = $file_name[0];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
            }
        }


        // for frame framing
        if(count($thumb_link)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'web/photo_frame/plain_mirror/images/frame_images/thumb/';

            
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = $this->image_upload2($thumb_link, $file_type_required, $destinationPath);

            if ($file_name != '') {
                if(!empty($model->thumb_link)){
                    @unlink(public_path()."/".$model->thumb_link);    
                }                
                
                $input['thumb_link'] = $file_name[0];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
            }
        }



        if($frame){
            Session::flash('flash_message_error',' Already Exists.');
        }else{

        	/* Transaction Start Here */
            DB::beginTransaction();
            try {
                PlainMirrorFrame::create($input);
                DB::commit();
                Session::flash('flash_message', 'Successfully added!');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', $e->getMessage());
            }

        }

        return redirect()->back();
    }



    public function show($id)
    {
        $pageTitle = 'Details';
        $data = PlainMirrorFrame::where('id',$id)->first();
        return view('plain_mirror.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $data = PlainMirrorFrame::where('id',$id)->first();
        
        return view('plain_mirror.update', ['data' => $data]);
    }

    public function image_show($id){
        $pageTitle = 'Image';
        $image = PlainMirrorFrame::where('id','=',$id)->get();

        return view('plain_mirror.image_view', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }


    public function update(Requests\PlainMirrorFrameRequest $request, $id)
    {
        $model = PlainMirrorFrame::where('id',$id)->first();
        $input = $request->all();
       
        $image=Input::file('image_link');
        $thumb_link=Input::file('thumb_link');
        $large_image_link=Input::file('large_image_link');


        // for frame show
        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'web/photo_frame/plain_mirror/images/frame_images/top_frame/';

            
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = $this->image_upload($image, $file_type_required, $destinationPath);

            if ($file_name != '') {
                if(!empty($model->image_link)){
                    @unlink(public_path()."/".$model->image_link);    
                }                
                
                $input['image_link'] = $file_name[0];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
            }
        }


        // for frame framing
        if(count($thumb_link)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'web/photo_frame/plain_mirror/images/frame_images/thumb/';

            
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = $this->image_upload2($thumb_link, $file_type_required, $destinationPath);

            if ($file_name != '') {
                if(!empty($model->thumb_link)){
                    @unlink(public_path()."/".$model->thumb_link);    
                }                
                
                $input['thumb_link'] = $file_name[0];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
            }
        }


        // for frame framing
        

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
        return redirect()->back();
    }


    public function delete($id)
    {
        try {
            $model = PlainMirrorFrame::where('id',$id)->first();
            if ($model->delete()) {
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }


    public function image_upload($image,$file_type_required,$destinationPath)
    {
        if ($image != '') {

            $img_name = ($_FILES['image_link']['name']);          

            $thumb_image_destination=$destinationPath;          

            //$rules = array('image' => 'required|mimes:png,jpeg,jpg');
            $rules = array('image' => 'required|mimes:'.$file_type_required);
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                //$destinationPath = 'uploads/slider_image/';
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = rand(111, 999) .'_'. $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);

                $file=array($destinationPath . $image_name, $thumb_image_destination);

                if ($upload_success) {
                    return $file_name = $file;
                }
                else{
                    return $file_name = '';
                }
            }
            else{
                return $file_name = '';
            }
        }
    }

  
   public function image_upload2($image,$file_type_required,$destinationPath)
    {
        if ($image != '') {

            $img_name = ($_FILES['thumb_link']['name']);          

            $thumb_image_destination=$destinationPath;          

            //$rules = array('image' => 'required|mimes:png,jpeg,jpg');
            $rules = array('image' => 'required|mimes:'.$file_type_required);
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                //$destinationPath = 'uploads/slider_image/';
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = 'framing_'.rand(111, 999) .'_'. $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);

                 $file=array($destinationPath.$image_name, $thumb_image_destination);

                if ($upload_success) {
                    return $file_name = $file;
                }
                else{
                    return $file_name = '';
                }
            }
            else{
                return $file_name = '';
            }
        }
    }






}