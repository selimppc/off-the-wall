<?php

namespace App\Http\Controllers;

use App\SocialIcon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;

class SocialIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "SocialIcon";

        $data = SocialIcon::orderBy('id', 'DESC')->paginate(10);

        return view('social_icon.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
    public function store(Requests\SocialIconRequest $request)
    {
        $input = $request->all();
        $image=Input::file('icon');
        $input['slug'] = str_slug(strtolower($input['title']));

        if ($image != '') {
            $rules = array('image' => 'required|mimes:ico,png,jpeg,jpg');
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                $destinationPath = 'uploads/social_icon/';
                $uploadfolder = 'uploads/';

                if ( !file_exists($uploadfolder) ) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir ($uploadfolder, 0777);
                }
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = rand(1, 9) . $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);
                if ($upload_success) {
                    $input['icon'] = $destinationPath . $image_name;
                    $input['link'] = $destinationPath . $image_name;
                }

                /* Transaction Start Here */
                DB::beginTransaction();
                try {
                    SocialIcon::create($input);
                    DB::commit();
                    Session::flash('flash_message', 'Successfully added!');
                } catch (\Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('flash_message_error', $e->getMessage());
                }
            }
            else{
                Session::flash('flash_message_error', 'Some thing error in image file type! Please Try again');
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
        $data = SocialIcon::where('slug',$slug)->first();
        return view('social_icon.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = SocialIcon::where('slug',$slug)->first();
        return view('social_icon.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SocialIconRequest $request, $slug)
    {

        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['title']));

        $model = SocialIcon::where('slug',$slug)->first();
        $image=Input::file('icon');

        if(count($image)>0) {

            $rules = array('image' => 'required|mimes:ico,png,jpeg,jpg');
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                //$destinationPath = 'uploads/social_icon/';
                $destinationPath = 'uploads/social_icon/';
                $uploadfolder = 'uploads/';
                if (!file_exists($uploadfolder)) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir($uploadfolder, 0777);
                }
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = rand(1, 9) . $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);
                if ($upload_success) {
                   unlink($model->icon);
                    $input['icon'] = $destinationPath . $image_name;
                    $input['link'] = $destinationPath . $image_name;
                }
            }
        }

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
            $model = SocialIcon::where('slug',$slug)->first();
            if ($model->delete()) {
                unlink($model->icon);
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

    public function image_show($slug){
        $pageTitle = 'Image';
        $image = SocialIcon::where('slug','=',$slug)->get();

        return view('social_icon.view_image', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

}
