<?php

namespace App\Http\Controllers;

use App\CatSlider;
use App\SliderImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Helpers\ImageResize;

class SliderImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Slider Image";

        $data = SliderImage::orderBy('id', 'DESC')->paginate(10);
        $cat_slider_id = CatSlider::lists('title','id');

        return view('slider_image.index', ['data' => $data,'cat_slider_id'=>$cat_slider_id,'pageTitle'=> $pageTitle]);
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
    public function store(Requests\SliderImageRequest $request)
    {
        $input = $request->all();
        $image = Input::file('image');

        $tittle = Input::get('name');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/slider_image/';
            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }

            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = SliderImageController::image_upload($image,$file_type_required,$destinationPath);
            if($file_name != ''){
                $input['image'] = $file_name[0];
                $input['thumbnail'] = $file_name[1];
            }
            else{
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                return redirect()->back();
            }
        }

        $slider_image = SliderImage::where('slug',$input['slug'])->exists();
        if($slider_image){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                SliderImage::create($input);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pageTitle = 'Show the detail';
        $data = SliderImage::where('slug',$slug)->first();
        return view('slider_image.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = SliderImage::where('slug',$slug)->first();
        $cat_slider_id = CatSlider::lists('title','id');
        return view('slider_image.update', ['data' => $data,'cat_slider_id'=>$cat_slider_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SliderImageRequest $request, $slug)
    {
        $model = SliderImage::where('slug',$slug)->first();
        $input = $request->all();
        $image=Input::file('image');

        $tittle = Input::get('name');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/slider_image/';

            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }

            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = SliderImageController::image_upload($image,$file_type_required,$destinationPath);
            if($file_name != '') {
                unlink($model->image);
                unlink($model->thumbnail);
                $input['image'] = $file_name[0];
                $input['thumbnail'] = $file_name[1];
            }
            else{
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                return redirect()->back();
            }
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
        try {
            $model = SliderImage::where('slug',$slug)->first();
            if ($model->delete()) {
                unlink($model->image);
                unlink($model->thumbnail);
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

    public function image_show($slug){
        $pageTitle = 'Image';
        $image = SliderImage::where('slug','=',$slug)->get();

        return view('slider_image.image_view', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

    public function image_upload($image,$file_type_required,$destinationPath){
        if ($image != '') {

            $img_name = ($_FILES['image']['name']);
            $random_number = rand(111, 999);

            $thumb_name = 'thumb_50x50_'.$random_number.'_'.$img_name;

            $newWidth=50;
            $targetFile=$destinationPath.$thumb_name;
            $originalFile=$image;

            $resizedImages 	= ImageResize::resize($newWidth, $targetFile,$originalFile);

            $thumb_image_destination=$destinationPath;
            $thumb_image_name=$thumb_name;

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
                $image_name = rand(11111, 99999) . $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);

                $file=array($destinationPath . $image_name, $thumb_image_destination.$thumb_image_name);

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
