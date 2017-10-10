<?php

namespace App\Http\Controllers;

use App\BlogCat;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;


class BlogCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Blog Category";

        $data = BlogCat::orderBy('id', 'DESC')->paginate(10);

        return view('blog_cat.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
    public function store(Requests\BlogCatRequest $request)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;

        $input['slug'] = str_slug(strtolower($input['title']));
        $input['created_by'] = $user_id;

        $blog_cat_exists = BlogCat::where('slug',$input['slug'])->exists();

        if($blog_cat_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                //print_r($input);exit;
                BlogCat::create($input);
                DB::commit();
                Session::flash('flash_message', 'Successfully added!');
            }catch (\Exception $e) {
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
        $data = BlogCat::where('slug',$slug)->first();
        return view('blog_cat.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = BlogCat::where('slug',$slug)->first();
        return view('blog_cat.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\BlogCatRequest $request,$slug)
    {
        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['title']));

        $model = BlogCat::where('slug',$slug)->first();

        /*$team_exists = BlogCat::where('slug',$input['slug'])->exists();

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
            $model = BlogCat::where('slug',$slug)->first();
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
