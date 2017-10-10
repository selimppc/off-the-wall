<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FrameCategory;

class AdminFrameCategoryController extends Controller{

	public function index()
	{
        $pageTitle = "Frame Category";

        $data = FrameCategory::orderBy('id', 'DESC')->paginate(30);
        
        return view('frame_category.index', ['data' => $data,'pageTitle'=> $pageTitle]);
	}


	public function store(Requests\FrameCategoryRequest $request)
    {
    	$input = $request->all();

    	$frame_category = FrameCategory::where('slug',$input['slug'])->exists();

        if($frame_category){
            Session::flash('flash_message_error',' Already Exists.');
        }else{

        	/* Transaction Start Here */
            DB::beginTransaction();
            try {
                FrameCategory::create($input);
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
        $data = FrameCategory::where('id',$id)->first();
        return view('frame_category.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $data = FrameCategory::where('id',$id)->first();
        
        return view('frame_category.update', ['data' => $data]);
    }

    public function update(Requests\FrameCategoryRequest $request, $id)
    {
        $model = FrameCategory::where('id',$id)->first();
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
            $model = FrameCategory::where('id',$id)->first();
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