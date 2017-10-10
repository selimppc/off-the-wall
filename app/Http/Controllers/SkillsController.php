<?php

namespace App\Http\Controllers;

use App\Skills;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Skills";

        $data = Skills::orderBy('id', 'DESC')->paginate(10);

        return view('skills.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_index(){
        $pageTitle = "Skills Add";
        $data = Skills::orderBy('id', 'DESC')->paginate(10);
        return view('skills.add', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
    public function store(Requests\SkillsRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['title']));
        $skill_exists = Skills::where('slug',$input['slug'])->exists();

        if($skill_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                Skills::create($input);
                DB::commit();
                Session::flash('flash_message', 'Successfully added!');
            }catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('flash_message_error', $e->getMessage());
                return redirect()->back();
            }
        }
        return redirect()->route('skills-index');
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
        $data = Skills::where('slug',$slug)->first();
        return view('skills.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pageTitle = "Skills update";
        $data = Skills::where('slug',$slug)->first();
        return view('skills.update', ['data' => $data,'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SkillsRequest $request, $slug)
    {
        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['title']));

        $model = Skills::where('slug',$slug)->first();

        /*$team_exists = Skills::where('slug',$input['slug'])->exists();

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
        return redirect()->route('skills-index');
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
            $model = Skills::where('slug',$slug)->first();
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
