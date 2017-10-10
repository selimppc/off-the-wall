<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mat;

class AdminMatController extends Controller{

	public function index()
	{
        $pageTitle = "Mat";

        $data = Mat::orderBy('id', 'DESC')->paginate(30);

        return view('mat.index', ['data' => $data,'pageTitle'=> $pageTitle]);
	}

	public function store(Requests\MatRequest $request)
    {
    	$input = $request->all();

    	$frame = Mat::where('color',$input['color'])->exists();


        if($frame){
            Session::flash('flash_message_error',' Already Exists.');
        }else{

        	/* Transaction Start Here */
            DB::beginTransaction();
            try {
                Mat::create($input);
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
        $data = Mat::where('id',$id)->first();
        return view('mat.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $data = Mat::where('id',$id)->first();

        return view('mat.update', ['data' => $data]);
    }

    public function update(Requests\MatRequest $request, $id)
    {
        $model = Mat::where('id',$id)->first();
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
            $model = Mat::where('id',$id)->first();
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