<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductGroup;
use App\ProductSubgroups;
use App\Http\Requests;
use App\Helpers\ImageResize;
use App\Http\Controllers\Controller;
use League\Flysystem\File;
use Illuminate\Support\Facades\Validator;

use DB;
use Session;
use Input;

class ProductSubgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "ProductSubgroups";
        $product_group_id = [''=>'Please select group']+ ProductGroup::lists('title','id')->all();
        // $product_group_id->prepend('Please Select');
        $data = ProductSubgroups::orderBy('id', 'DESC')->paginate(20);
        return view('product_subgroup.index',['data' => $data,'pageTitle' => $pageTitle,'product_group_id' => $product_group_id]);
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
    public function store(Requests\ProductSubgroupRequest $request)
    {
        $input = $request->all();
        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        $product_group_id = Input::get('product_group_id');
        $input['product_group_id'] = $product_group_id;

        $image=Input::file('image');
       

        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/product_category_image/';
            $uploadfolder = 'uploads/';
            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }


            if($image)
                $file_name = ProductSubgroupController::image_upload($image,$file_type_required,$destinationPath);
            if(isset($file_name) != ''){
                $input['image'] = $file_name[0];
                $input['thumb'] = $file_name[1];
            }
        }


        DB::beginTransaction();
        try {
            
            ProductSubgroups::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('product-subgroup-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = ProductSubgroups::where('id',$id)->first();
       $pageTitle ='Product Subgroup';
       return view('product_subgroup.show', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProductSubgroups::where('id',$id)->first();
        $product_group_id = ProductGroup::lists('title','id');
        return view('product_subgroup.update', ['data' => $data,'product_group_id' => $product_group_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductSubgroupRequest $request, $id)
    {
       $model = ProductSubgroups::where('id',$id)->first();
       $input = $request->all();
       $tittle = Input::get('title');
       $slug = str_slug($tittle);
       $input['slug'] = $slug;

       $image=Input::file('image');
       

        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/product_category_image/';
            $uploadfolder = 'uploads/';
            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }


            if($image)
                $file_name = ProductSubgroupController::image_upload($image,$file_type_required,$destinationPath);

                @unlink(public_path()."/".$model->image);
                @unlink(public_path()."/".$model->thumb);

            if(isset($file_name) != ''){
                $input['image'] = $file_name[0];
                $input['thumb'] = $file_name[1];
            }
        }

        $product_group_id = Input::get('product_group_id');
        $input['product_group_id'] = $product_group_id;

        DB::beginTransaction();
        try {
            
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('product-subgroup-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
       
        DB::beginTransaction();
        try {
            $model = ProductSubgroups::where('id',$id)->first();
            if ($model->delete()) {

                @unlink(public_path()."/".$model->image);
                @unlink(public_path()."/".$model->thumb);
                
                DB::commit();               
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }


    public function image_upload($image,$file_type_required,$destinationPath){
        if ($image != '') {

            $img_name = ($_FILES['image']['name']);
            $random_number = rand(111, 999);

            $thumb_name = 'thumb_200x200_'.$random_number.'_'.$img_name;

            $newWidth=200;
            $targetFile=$destinationPath.$thumb_name;
            $originalFile=$image;

            $resizedImages  = ImageResize::resize($newWidth, $targetFile,$originalFile);

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
