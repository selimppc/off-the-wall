<?php

namespace App\Http\Controllers;

use App\ProductGroup;
use Illuminate\Http\Request;
use DB;
use Session;
use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "ProductGroup";

        $data = ProductGroup::orderBy('id', 'DESC')->paginate(20);
        return view('product_group.index',['pageTitle' => $pageTitle,'data' => $data]);
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
    public function store(Requests\ProductGroupRequest $request)
    {
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            
            ProductGroup::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('product-group-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $data = ProductGroup::where('slug',$slug)->first();
       $pageTitle ='Product Group';
       return view('product_group.show', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
       $data = ProductGroup::where('slug',$slug)->first();
        return view('product_group.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $model = ProductGroup::where('slug',$slug)->first();
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

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

        return redirect()->route('product-group-index');
    }

    public function delete($slug)
    {
       
        DB::beginTransaction();
        try {
            $model = ProductGroup::where('slug',$slug)->first();
            if ($model->delete()) {                
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
}
