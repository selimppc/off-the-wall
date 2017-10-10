<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ImageSize;

class AdminPhotoFrameController extends Controller{

	public function index()
	{
	        $pageTitle = "Image Size";

	        $data = ImageSize::orderBy('id', 'DESC')->paginate(30);
	        

	        return view('photo_frame.index', ['data' => $data,'pageTitle'=> $pageTitle]);
	}

	public function store(Requests\ImageSizeRequest $request)
    {
    	$input = $request->all();

    	$image_size = ImageSize::where('value',$input['value'])->exists();
        if($image_size){
            Session::flash('flash_message_error',' Already Exists.');
        }else{

        	/* Transaction Start Here */
            DB::beginTransaction();
            try {
                ImageSize::create($input);
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
        $data = ImageSize::where('id',$id)->first();
        return view('photo_frame.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $data = ImageSize::where('id',$id)->first();
        
        return view('photo_frame.update', ['data' => $data]);
    }


    public function update(Requests\ImageSizeRequest $request, $id)
    {
        $model = ImageSize::where('id',$id)->first();
        $input = $request->all();
       
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
            $model = ImageSize::where('id',$id)->first();
            if ($model->delete()) {
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

}