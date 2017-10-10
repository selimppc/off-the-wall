<?php

namespace App\Http\Controllers;

use App\BlogComment;
use App\BlogItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $pageTitle = "Blog Comment";

        $data = BlogItem::where('slug', $slug)->first();
        $comment_data = BlogComment::where('blog_item_id', $data['id'])->get();
        return view('blog_comment._form', ['data' => $data, 'pageTitle'=> $pageTitle, 'comment_data'=> $comment_data]);
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

    public function store(Requests\BlogCommentRequest $request)
    {
        $input = $request->all();

        $user_id = Auth::user()->id;
        $name = Auth::user()->first_name;
        $email = Auth::user()->email;

        $input['created_by'] = $user_id;
        $input['name'] = $name;
        $input['email'] = $email;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            BlogComment::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully Comment added!');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show the detail';
        $data = BlogComment::findOrFail($id);
        return view('blog_comment.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BlogComment::findOrFail($id);
        $blog_item_id = BlogItem::lists('title','id');
        return view('blog_comment.update', ['data' => $data,'blog_item_id'=>$blog_item_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\BlogCommentRequest $request, $id)
    {
        $model = BlogComment::findOrFail($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $model = BlogComment::findOrFail($id);
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
