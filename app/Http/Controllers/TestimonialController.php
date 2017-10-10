<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Testimonial";

        $data = Testimonial::orderBy('id', 'DESC')->paginate(10);

        return view('testimonial.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_index()
    {
        $pageTitle = "Testimonial";
        $data = Testimonial::orderBy('id', 'DESC')->paginate(10);

        return view('testimonial.add', ['pageTitle'=> $pageTitle,'data'=>$data ]);
    }

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
    public function store(Requests\TestimonialRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['name']));
        $team_exists = Testimonial::where('slug',$input['slug'])->exists();

        if($team_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else{
            DB::beginTransaction();
            try {
                Testimonial::create($input);
                DB::commit();
                Session::flash('flash_message', 'Successfully added!');
            }catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', $e->getMessage());
            }
        }
        return redirect()->route('testimonial-index');
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
        $data = Testimonial::where('slug',$slug)->first();
        return view('testimonial.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pageTitle = 'Edit the detail';
        $data = Testimonial::where('slug',$slug)->first();
        return view('testimonial.update', ['data' => $data,'pageTitle'=>$pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TestimonialRequest $request, $slug)
    {
        $input = $request->all();
        $model = Testimonial::where('slug',$slug)->first();

        $input['slug'] = str_slug(strtolower($input['name']));

        /*$team_exists = Testimonial::where('slug',$input['slug'])->exists();

        if($team_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else{*/
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
        //}
        return redirect()->route('testimonial-index');
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
            $model = Testimonial::where('slug',$slug)->first();
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
