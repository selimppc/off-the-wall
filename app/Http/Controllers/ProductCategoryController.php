<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductGroup;
use App\ProductSubgroups;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use League\Flysystem\File;
use Session;
use Input;
use App\Helpers\ImageResize;
use App\Helpers\PostSearch;
use App\Helpers\ImageUpload;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "ProductCategory";

        $product_group_id = ProductGroup::lists('title','id');
        $data = ProductCategory::orderBy('id', 'DESC')->paginate(20);
        return view('product_category.index',['pageTitle' => $pageTitle,'data' => $data,'product_group_id' => $product_group_id]);
    }



    public function cat_product_category_ajax(){

         $input_data = Input::all();
         $subgroup_id = $input_data['product_subgroup_id'];

         $category_data = ProductCategory::where('subgroup_id',$subgroup_id)->get();

         $select = '';
         $select.='<option value="">Select Category</option>';
         foreach($category_data as $category):
            $select.='<option value="'.$category->id.'">'.$category->title.'</option>';
         endforeach;

         $ajax_response_data = array(
            'status' => "1",
            'message' => "$select"
        );
        echo json_encode($ajax_response_data);
        exit;
    }

    public function cat_product_group_ajax(){

         $input_data = Input::all();
         $group_id = $input_data['product_group_id'];

         $subgroup_data = ProductSubgroups::where('product_group_id',$group_id)->get();

         $select = '';
         $select.='<option value="">Select SubGroup</option>';
         foreach($subgroup_data as $subgroup):
            $select.='<option value="'.$subgroup->id.'">'.$subgroup->title.'</option>';
         endforeach;

         $ajax_response_data = array(
            'status' => "1",
            'message' => "$select"
        );
        echo json_encode($ajax_response_data);
        exit;
    }

    public function add_index()
    {
        $pageTitle = "ProductCategory";
        return view('product_category.add', ['pageTitle'=> $pageTitle]);
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
    // public function store(Requests\ProductCategoryRequest $request)
    public function store(Requests\ProductCategoryRequest $request)
    {
        $input = $request->all();

        $image = Input::file('image');
        
        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;
        $input['subgroup_id'] = Input::get('product_subgroup_id');
        $input['group_id'] = Input::get('group_id');

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
               $file_name = $this->image_upload($image,$file_type_required,$destinationPath);
                //$file_name= ImageUpload::image_upload($image,$file_type_required,$destinationPath);
                
                $input['image'] = $file_name;
        }
      
        DB::beginTransaction();
        try {
            
            ProductCategory::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('product-category-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = ProductCategory::where('id',$id)->first();
       $pageTitle ='Product Category';
       return view('product_category.show', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product_group_id = ProductGroup::lists('title','id');
        $data = ProductCategory::where('slug',$slug)->first();
        return view('product_category.update', ['data' => $data,'product_group_id' => $product_group_id]);
    }

    public function image_show($slug){
        $pageTitle = 'Image';
        $image = ProductCategory::where('slug','=',$slug)->get();

        return view('product_category.view_image', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductCategoryRequest $request, $slug)
    {
        $model = ProductCategory::where('slug',$slug)->first();
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        $input['subgroup_id'] = Input::get('product_subgroup_id');
        $input['group_id'] = Input::get('group_id');
         $image = Input::file('image');

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
                $file_name = $this->image_upload($image,$file_type_required,$destinationPath);
                
                if ($file_name != '') {
                    if($model->image != NULL){
                        unlink(public_path()."/uploads/product_category_image/".$model->image);    
                    }
                    
                    $input['image'] = $file_name;
                } else {
                    Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                }
                $input['image'] = $file_name;
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

        return redirect()->route('product-category-index');
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

    public function delete($slug)
    {
       
        try {
            $model = ProductCategory::where('slug',$slug)->first();
            if ($model->delete()) {

                if(!empty($model->image)):
                    unlink(public_path()."/uploads/product_category_image/".$model->image);
                endif;
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

     public function image_upload($image,$file_type_required,$destinationPath){
        if ($image != '') {

            $img_name = ($_FILES['image']['name']);
            

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

               

                if ($upload_success) {
                    return $file_name = $image_name;
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
