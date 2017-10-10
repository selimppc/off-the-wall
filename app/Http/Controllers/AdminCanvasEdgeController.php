<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CanvasEdge;
use App\Helpers\ImageResize;

class AdminCanvasEdgeController extends Controller{


	public function index(Request $request)
	{

        $input = $request->all();

        $data = CanvasEdge::orderBy('id', 'DESC')->paginate(30);

        $pageTitle = "Canvas Edge";

        
        return view('canvas_edge.index', [
                    'data' => $data,
                    'pageTitle'=> $pageTitle,
        ]);
	}


	public function store(Requests\CanvasEdgeRequest $request)
    {
    	$input = $request->all();

    	$canvas_edge = CanvasEdge::where('value',$input['value'])->exists();

        $image=Input::file('image_link');


        // for frame show
        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'images/canvas_edge_images/';

            
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



        if($canvas_edge){
            Session::flash('flash_message_error',' Already Exists.');
        }else{

        	/* Transaction Start Here */
            DB::beginTransaction();
            try {
                CanvasEdge::create($input);
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
        $data = CanvasEdge::where('id',$id)->first();
        return view('canvas_edge.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $data = CanvasEdge::where('id',$id)->first();        
        
        return view('canvas_edge.update', ['data' => $data]);
    }

    public function image_show($id){
        $pageTitle = 'Image';
        $image = CanvasEdge::where('id','=',$id)->get();

        return view('canvas_edge.image_view', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }


    public function update(Requests\CanvasEdgeRequest $request, $id)
    {
        $model = CanvasEdge::where('id',$id)->first();
        $input = $request->all();
       
        $image=Input::file('image_link');

        // for frame show
        if(count($image)>0) {
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'images/canvas_edge_images/';

            
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
            $model = CanvasEdge::where('id',$id)->first();
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

}