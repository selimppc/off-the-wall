<?php

namespace App\Http\Controllers;

use App\CatSlider;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;

class CatSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Slider Category";

        $data = CatSlider::orderBy('id', 'DESC')->paginate(10);

        return view('cat_slider.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
    public function store(Requests\CatSliderRequest $request)
    {
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        $cat_slider = CatSlider::where('slug',$input['slug'])->exists();
        if($cat_slider){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else {

            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                CatSlider::create($input);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pageTitle = 'Show the detail';
        $data = CatSlider::where('slug',$slug)->first();
        return view('cat_slider.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = CatSlider::where('slug',$slug)->first();
        return view('cat_slider.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CatSliderRequest $request, $slug)
    {
        $model = CatSlider::where('slug',$slug)->first();
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
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
        try {
            $model = CatSlider::where('slug',$slug)->first();
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
