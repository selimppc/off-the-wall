<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductGroup;
use App\ProductSubgroups;
use App\ProductCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\ImageResize;
use Illuminate\Support\Facades\Validator;

use DB;
use Session;
use Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $input = $request->all();

       //set null id(s)
       $id_product_group = null;
       $id_product_subgroup = null;
       $product_subgroup_lists = null;

       //if post method
       if($_GET){        
            //declare model
            $model = Product::with('relGetproductgroup');

            // if product_group_id
            if($pg_id = $request->get('product_group_id'))
            {
                
                if($pg_id == 'all'){
                    //do nothing 
                }else{
                    $model = $model->where('product_group_id', $pg_id);
                }
                $id_product_group = $pg_id;
               
            }
            //if product_subgroup_id
            if($ps_id = $request->get('product_subgroup_id'))
            {
                $model = $model->where('product_subgroup_id', $ps_id);
                $id_product_subgroup = $ps_id;

                $product_subgroup_lists = [''=>'Please select sub group']+ ProductSubgroups::where('product_group_id',$pg_id)->lists('title','id')->all();
            }
            //get data 
            $data = $model->paginate(30);

       }else{
        //get data
            $data = Product::orderBy('id', 'DESC')->paginate(30);
       }


       $pageTitle = "Product";
       $product_group_id = [''=>'Please select group']+ ProductGroup::lists('title','id')->all();

       $product_group_id_search = ['all'=>'All']+ ProductGroup::lists('title','id')->all();
       $cat_product_id = ProductCategory::lists('title','id');

       
        return view('product.index',[
                'pageTitle' => $pageTitle,
                'cat_product_id' => $cat_product_id,
                'data' => $data,
                'product_group_id' => $product_group_id,
                'product_group_id_search' => $product_group_id_search,
                'id_product_group' => $id_product_group,
                'id_product_subgroup'=>$id_product_subgroup,
                'product_subgroup_lists' => $product_subgroup_lists
            ]);
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

    


    public function store(Requests\ProductRequest $request)
    {
       $input = $request->all();
       $tittle = Input::get('title');
       $slug = str_slug($tittle);
       $input['slug'] = $slug;

      
        $image=Input::file('image');
        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/product_image/';

            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }

            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name =$this->image_upload($image,$file_type_required,$destinationPath);
            if($file_name != '') {
                $input['image'] = $file_name[0];
                $input['thumb'] = $file_name[1];
            }
            else{
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
                return redirect()->back();
            }
        }



       DB::beginTransaction();
        try {
            
            Product::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('product-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($slug)
    {
       $data = Product::where('slug',$slug)->first();
       $pageTitle ='Product';
       return view('product.show', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    public function duplicate($slug){

        $data = Product::where('slug',$slug)->first();

        $model = new Product();
        $model->product_category_id = $data->product_category_id;
        $model->product_group_id = $data->product_group_id;
        $model->product_subgroup_id = $data->product_subgroup_id;
        $model->title = "copy-" . $data->title;
        $model->slug = "copy-" . $data->slug;
        $model->short_description = $data->short_description;
        $model->long_description = $data->long_description;
        $model->status = $data->status;
        $model->class = $data->class;
        $model->sell_rate =  $data->sell_rate;
        $model->cost_price =  $data->cost_price;
        $model->stock_unit_quantity =  $data->stock_unit_quantity;
        $model->is_featured =  $data->is_featured;
        $model->before_price =  $data->before_price;
        $model->product_code =  $data->product_code;
        $model->size =  $data->size;
        $model->other_size =  $data->other_size;
        $model->meta_title =  $data->meta_title;
        $model->delivery_info  = $data->delivery_info;

        $model->save();

        return redirect()->route('product-index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Product::where('slug',$slug)->first();
        $product_group_id = ProductGroup::lists('title','id');
        $cat_product_id = ProductCategory::lists('title','id');
        return view('product.update', [
                'data' => $data,
                'cat_product_id' => $cat_product_id,
                'product_group_id' => $product_group_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductRequest $request, $slug)
    {
       $model = Product::where('slug',$slug)->first();
       $input = $request->all();
       $tittle = Input::get('title');
       $slug = str_slug($tittle);
       $input['slug'] = $slug;

        $image=Input::file('image');

      

        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/product_image/';

            $uploadfolder = 'uploads/';

            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }

            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }

            $file_name = $this->image_upload($image, $file_type_required, $destinationPath);

            if ($file_name != '') {
                if(!empty($model->image)){
                    @unlink(public_path()."/".$model->image);    
                }
                
                if(!empty($model->thumb)){
                    @unlink(public_path()."/".$model->thumb);    
                }
                
                $input['image'] = $file_name[0];
                $input['thumb'] = $file_name[1];
            } else {
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
            }
        }

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

        return redirect()->route('product-index');
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
       
        DB::beginTransaction();
        try {
            $model = Product::where('slug',$slug)->first();
            if ($model->delete()) {

                if(!empty($model->image)):
                    @unlink(public_path()."/".$model->image);
                    @unlink(public_path()."/".$model->thumb);
                endif;
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

    public function image_show($slug){
        $pageTitle = 'Image';
        $image = Product::where('slug','=',$slug)->get();

        return view('product.view_image', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

    public function image_upload($image,$file_type_required,$destinationPath)
    {
        if ($image != '') {

            $img_name = ($_FILES['image']['name']);
            $random_number = rand(111, 999);

            $thumb_name = 'thumb_'.$random_number.'_'.$img_name;

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
