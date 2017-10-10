<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Productvariation;

use App\Http\Controllers\Controller;

use DB;
use Session;
use Input;

class ProductvariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        $productdata = Product::where('slug',$slug)->first();
        $data = Productvariation::where('product_id',$productdata->id)->orderBy('id', 'DESC')->paginate(20);
        $pageTitle = "Product Variation";
        return view('productvariation.index',[
                    'pageTitle' => $pageTitle,
                    'productdata' => $productdata,
                    'data' => $data
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
    public function store(Request $request)
    {
       $input = $request->all();


       $tittle = Input::get('title');
       $slug = str_slug($tittle);
       $input['slug'] = $slug;

       $product_id = Input::get('product_id');
       $input['product_id'] = $product_id;

       $productdata = Product::where('id',$product_id)->first();

       DB::beginTransaction();
        try {
            
            Productvariation::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('productvariation-index', $productdata->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $data = Productvariation::where('slug',$slug)->first();
       $pageTitle ='Product variation';
       return view('productvariation.show', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pageTitle ='Product variation';
        $data = Productvariation::where('slug',$slug)->first();
        $productdata = Product::where('id',$data->product_id)->first();

        return view('productvariation.update',[
                'data' => $data,
                'productdata' => $productdata,
                'pageTitle' => $pageTitle
            ]);
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
       $model = Productvariation::where('slug',$slug)->first();
       $input = $request->all();
       $tittle = Input::get('title');
       $slug = str_slug($tittle);
       $input['slug'] = $slug;

       $product_id = Input::get('product_id');
       $input['product_id'] = $product_id;

       $productdata = Product::where('id',$product_id)->first();

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

        return redirect()->route('productvariation-index', $productdata->slug);
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

    public function delete($id){

        DB::beginTransaction();
        try {
            $model = Productvariation::where('id',$id)->first();
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

}
