<?php

namespace App\Http\Controllers;

use App\BlogCat;
use App\BlogItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class BlogItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Blog Item";

        $data = BlogItem::orderBy('id', 'DESC')->paginate(10);
        $blog_cat_id = BlogCat::lists('title','id');

        return view('blog_item.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'blog_cat_id'=> $blog_cat_id]);
    }
    public function add_index()
    {
        $pageTitle = "Blog Item";
        $data = BlogItem::orderBy('id', 'DESC')->paginate(10);
        $blog_cat_id = BlogCat::lists('title','id');

        return view('blog_item.add', ['pageTitle'=> $pageTitle,'data'=>$data , 'blog_cat_id'=>$blog_cat_id]);
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
    public function store(Requests\BlogItemRequest $request)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;

        $input['created_by'] = $user_id;
        $input['slug'] = str_slug(strtolower($input['title']));

        $blog_item_exists = BlogItem::where('slug',$input['slug'])->exists();

        if($blog_item_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                //print_r($input);exit;
                BlogItem::create($input);
                DB::commit();
                Session::flash('flash_message', 'Successfully added!');
            }catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', $e->getMessage());
            }
        }
        return redirect()->route('blog_item-index');
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
        $data = BlogItem::where('slug',$slug)->first();
        return view('blog_item.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pageTitle = 'update blog item';
        $data = BlogItem::where('slug',$slug)->first();
        $blog_cat_id = BlogCat::lists('title','id');
        return view('blog_item.update', ['data' => $data,'blog_cat_id'=>$blog_cat_id,'pageTitle'=>$pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\BlogItemRequest $request, $slug)
    {
        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['title']));

        $model = BlogItem::where('slug',$slug)->first();

        /*$team_exists = BlogItem::where('slug',$input['slug'])->exists();

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
        return redirect()->route('blog_item-index');
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
            $model = BlogItem::where('slug',$slug)->first();
            if ($model->delete()) {
                Session::flash('flash_message', " Successfully Deleted.");
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
        }
        return redirect()->back();
    }

    public function comment(Requests\BlogItemRequest $request)
    {
//        exit('bhgfh');
        $input = $request->all();
        $user_id = Auth::user()->id;

        $input['created_by'] = $user_id;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            BlogItem::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }
        return redirect()->back();
    }
}
