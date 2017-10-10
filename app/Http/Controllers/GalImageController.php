<?php

namespace App\Http\Controllers;

use App\Product;
use App\GalImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Helpers\ImageResize;

class GalImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Gallery Image";

        $data = GalImage::orderBy('id', 'DESC')->paginate(10);
        $product_id = Product::lists('title','id');

        return view('gal_image.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'product_id'=> $product_id]);
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
    public function store(Requests\GalImageRequest $request)
    {
        $input = $request->all();
        $image=Input::file('image');

        $product_id = Input::get('product_id');
        $tittle = Input::get('name');
        $slug = str_slug($tittle);

        $exists = GalImage::where('product_id',$product_id)->exists();
        if($exists){
            $count = GalImage::where('product_id',$product_id)->count();
            $input['slug'] = $slug."-".($count+1);
        }else{
            $input['slug'] = $slug."-1";
        }

        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/gallery_image/';

            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }

            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = GalImageController::image_upload($image,$file_type_required,$destinationPath);
                    if($file_name != '') {
                        $input['image'] = $file_name[0];
                        $input['thumbnail'] = $file_name[1];
                    }
                    else{
                        Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                        return redirect()->back();
                    }
            }


        $gallery_image = GalImage::where('slug',$input['slug'])->exists();
        if($gallery_image){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else {

            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                GalImage::create($input);
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
        $data = GalImage::where('slug',$slug)->first();
        return view('gal_image.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = GalImage::where('slug',$slug)->first();
        $product_id = Product::lists('title','id');
        return view('gal_image.update', ['data' => $data,'product_id'=>$product_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\GalImageRequest $request, $slug)
    {
        $model = GalImage::where('slug',$slug)->first();
        $input = $request->all();

        $tittle = Input::get('name');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        $image=Input::file('image');
        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/gallery_image/';

            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }

            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = GalImageController::image_upload($image, $file_type_required, $destinationPath);

            if ($file_name != '') {
                unlink(public_path()."/".$model->image);
                unlink(public_path()."/".$model->thumbnail);
                $input['image'] = $file_name[0];
                $input['thumbnail'] = $file_name[1];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
            }
        }
            DB::beginTransaction();
            try {
                $model->update($input);
                DB::commit();
                Session::flash('flash_message', "Successfully Updated");
            } catch (Exception $e) {
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
            $model = GalImage::where('slug',$slug)->first();
            if ($model->delete()) {
                unlink(public_path()."/".$model->image);
                unlink(public_path()."/".$model->thumbnail);
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
        $image = GalImage::where('slug','=',$slug)->get();

        return view('gal_image.view_image', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

    public function image_upload($image,$file_type_required,$destinationPath)
    {
        if ($image != '') {

            $img_name = ($_FILES['image']['name']);
            $random_number = rand(111, 999);

            $thumb_name = 'thumb_400x400_'.$random_number.'_'.$img_name;

            $newWidth=400;
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
                $image_name = rand(111, 999) . $image_original_name;
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
