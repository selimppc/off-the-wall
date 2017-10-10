<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;

use Intervention\Image\Facades\Image;
use App\Helpers\ImageResize;





class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Media Manager";

        $data = Media::orderBy('id', 'DESC')->paginate(10);

        return view('media.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
    public function store(Requests\MediaRequest $request)
    {
        $input = $request->all();
        $image=Input::file('file_name');

//        print_r($input['file_name']);exit;
        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/media/';
            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = MediaController::image_upload($image,$file_type_required,$destinationPath);
            if($file_name != '') {
                $input['file_name'] = $file_name[0];
                $input['thumbnail'] = $file_name[1];
                $input['url'] = $file_name[0];
            }
            else{
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                return redirect()->back();
            }
        }
            DB::beginTransaction();
            try {
                Media::create($input);
                DB::commit();
                Session::flash('flash_message', 'Successfully added!');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', $e->getMessage());
            }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show the detail';
        $data = Media::findOrFail($id);
        return view('media.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }


    public function image_show($id){
        $pageTitle = 'Image';
        $image = Media::where('id','=',$id)->get();

        return view('media.view_image', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Media::findOrFail($id);
        return view('media.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\MediaRequest $request, $id)
    {
        $model = Media::findOrFail($id);
        $input = $request->all();
        $image=Input::file('file_name');

        if(count($image)>0) {

            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/media/';
            $uploadfolder = 'uploads/';

            if (!file_exists($uploadfolder)) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir($uploadfolder, 0777);
            }
            if (!file_exists($destinationPath)) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir($destinationPath, 0777);
            }

            $file_name = MediaController::image_upload($image, $file_type_required, $destinationPath);

            if ($file_name != '') {
                unlink($model->file_name);
                unlink($model->thumbnail);
                $input['file_name'] = $file_name[0];
                $input['thumbnail'] = $file_name[1];
                $input['url'] = $file_name[0];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                return redirect()->back();
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
    public function delete($id)
    {
        try {
            $model = Media::findOrFail($id);
            if ($model->delete()) {
                unlink($model->file_name);
                unlink($model->thumbnail);
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

            $img_name = ($_FILES['file_name']['name']);
            $random_number = rand(1, 9);

            $thumb_name = 'thumb-50x50-'.$random_number.'-'.$img_name;

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
                $image_name = rand(1, 9) . $image_original_name;
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


    /*
     * Image resize custom function
     *
     * For using this function ##
     *
     * 1. Add intervention/image and illuminate/html in composer.JSON file(intervention)
     * 2.composer update
     * 3.Add providers array and aliases array in config/app.php file
     * 4.use Intervention\Image\Facades\Image in Controller file
     * */

    /*private function resize($image, $size)
    {
        try
        {
            $extension 		= 	$image->getClientOriginalExtension();
            $imageRealPath 	= 	$image->getRealPath();
            $thumbName 		= 	'thumb_'. $image->getClientOriginalName();
            //$imageManager = new ImageManager(); // use this if you don't want facade style code
            //$img = $imageManager->make($imageRealPath);

            //$img = Image::make($imageRealPath); // use this if you want facade style code

            $img = Image::make($imageRealPath)->resize(50, 50);

            //$img->resize(intval($size,50), null, function($constraint) {
                //$constraint->aspectRatio();
            //});

            $thumbName = rand(11111, 99999) . $thumbName;

            return $img->save(public_path('uploads'). '/'. $thumbName);
        }
        catch(Exception $e)
        {
            return false;
        }

    }*/
}
