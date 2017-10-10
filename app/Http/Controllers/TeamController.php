<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Team";

        $data = Team::orderBy('id', 'DESC')->paginate(10);

        return view('team.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
    public function store(Requests\TeamRequest $request)
    {
        $input = $request->all();
        $image = Input::file('image');
        $input['slug'] = str_slug(strtolower($input['first_name'].'-'.$input['last_name']));
        $team_exists = Team::where('slug',$input['slug'])->exists();

        if($team_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else{
            if(isset($image)) {

                $model = new Team();

                $rules = array('image' => 'required|mimes:png,gif,jpeg,jpg');
                $validator = Validator::make(array('image' => $image), $rules);
                if ($validator->passes()) {

                    // Files destination
                    $destinationPath = 'uploads/team/images/';
//                    print_r($destinationPath);exit;
                    //if path does not exist
                    if ( !file_exists($destinationPath) ) {
                        $oldmask = umask(0);  // helpful when used in linux server
                        mkdir($destinationPath, 0777,true);
                    }

                    $file_original_name = $image->getClientOriginalName();
                    $file_name = rand(11111, 99999) . $file_original_name;
                    $image->move($destinationPath, $file_name);
                    $input['image'] = 'uploads/team/images/'.$file_name;

//                    print_r($path);exit;
                    /* Transaction Start Here */
                    DB::beginTransaction();
                    try {
//                        print_r($data);exit;
                        $model->create($input);

                        DB::commit();
                        Session::flash('flash_message', ' successfully Added!');
                    }catch (Exception $e) {
                        //If there are any exceptions, rollback the transaction`
                        DB::rollback();
                        Session::flash('flash_message_error', "Invalid Request" );
                    }
                } else {
                    Session::flash('flash_message_error', 'uploaded file is not valid');
                }
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
        $data = Team::where('slug',$slug)->first();
//        print_r($data);exit;
        return view('team.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Team::where('slug',$slug)->first();
        return view('team.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TeamRequest $request,$slug)
    {
        $input = $request->all();
        $model = Team::where('slug',$slug)->first();

        $input['slug'] = str_slug(strtolower($input['first_name'].'-'.$input['last_name']));

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
            $model = Team::where('slug',$slug)->first();
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
