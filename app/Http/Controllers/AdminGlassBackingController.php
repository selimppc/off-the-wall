<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\GlassBacking;

class AdminGlassBackingController extends Controller{

	public function index()
	{
        $pageTitle = "Glass & Backing";

        $data = GlassBacking::orderBy('id', 'DESC')->paginate(30);

        return view('glass_backing.index', ['data' => $data,'pageTitle'=> $pageTitle]);
	}

	public function store(Requests\GlassBackingRequest $request)
    {
    	$input = $request->all();

    	$input['slug'] = str_slug($input['title']);

    	$glass_backing = GlassBacking::where('slug',$input['slug'])->exists();


        if($glass_backing){
            Session::flash('flash_message_error',' Already Exists.');
        }else{

        	/* Transaction Start Here */
            DB::beginTransaction();
            try {
                GlassBacking::create($input);
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
        $data = GlassBacking::where('id',$id)->first();
        return view('glass_backing.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $data = GlassBacking::where('id',$id)->first();

        return view('glass_backing.update', ['data' => $data]);
    }

    public function update(Requests\GlassBackingRequest $request, $id)
    {
        $model = GlassBacking::where('id',$id)->first();
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
            $model = GlassBacking::where('id',$id)->first();
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