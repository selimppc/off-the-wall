<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuType;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Response;
use Session;
use Input;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pageTitle = "Menu";

        if($this->isPostRequest()){
            $q = Input::get('search_term');
            $data = Menu::where('name', 'LIKE', "%".$q."%")->paginate(20);
            $menu_type = MenuType::lists('title','id');
            $parent = Menu::with('relMenu')->get();
            $parent_total = Menu::groupBy('parent')->count();
        }else{
            $data = Menu::orderBy('id', 'DESC')->paginate(20);
            $menu_type = MenuType::lists('title','id');
            $parent = Menu::with('relMenu')->get();
            $parent_total = Menu::groupBy('parent')->count();
        }
        /*$html_menu_items = '<select class="form-control" name="parent">'.$this->html_ordered_menu($parent,0,0).'</select>';*/
        return view('menu.index', ['data' => $data,'menu_type'=>$menu_type,'pageTitle'=> $pageTitle,'parent'=>$parent,'parent_total'=>$parent_total]);
    }
    function html_ordered_menu($array,$parent_id = 0,$value )
    {
            /*$temp_array = array();
            foreach($array as $element)
            {
                if($element['parent']==$parent_id)
                {
                    $element['subs'] = $this->html_ordered_menu($array,$element['id']);
                    $temp_array[] = $element;
                }
            }
            return $temp_array;*/
        $menu_html = '<optgroup>';
        foreach($array as $element)
        {
            if($element['parent']==$parent_id)
            {
                if($value == $element['id']){
                   // $menu_html .= '<li style="padding-left: 20px;"><input checked="checked" type="radio" name="parent" value="'.$element['id'].'">'.$element['name'].'';
                    $menu_html .= '<option selected style="padding-left: 20px;" value="'.$element['id'].'">'.$element['name'].'';
                }
                else{
                    //$menu_html .= '<li style="padding-left: 20px;"><input type="radio" name="parent" value="'.$element['id'].'">'.$element['name'].'';
                    $menu_html .= '<option style="padding-left: 20px;" value="'.$element['id'].'">'.$element['name'].'';
                }

                $menu_html .= $this->html_ordered_menu($array,$element['id'],$value);
                //$menu_html .= '</li>';
                $menu_html .= '</option>';
            }
        }
        $menu_html .= '</optgroup>';
        return $menu_html;
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
    public function store(Requests\MenuRequest $request)
    {
        $input = $request->all();

        $tittle = Input::get('name');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        $menu = Menu::where('slug',$input['slug'])->exists();
        if($menu){
            Session::flash('flash_message_error',' Already Exists.');
        }
        else {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                Menu::create($input);
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
    public function show($slug,$id)
    {

        $pageTitle = 'Show the detail';
        $data = Menu::where('slug',$slug)->where('id',$id)->first();
        return view('menu.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$id)
    {
        $data = Menu::with('relMenu')->where('slug',$slug)->where('id',$id)->first();
        $menu_type = MenuType::lists('title','id');
        $parent = Menu::with('relMenu')->get();
        /*$selected_menu = $data->parent;
        $html_menu_items = '<select class="form-control" name="parent">'.$this->html_ordered_menu($parent,0,$selected_menu).'</select>';*/
        return view('menu.update', ['data' => $data,'menu_type'=>$menu_type,'parent'=>$parent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\MenuRequest $request, $slug,$id)
    {
        $model = Menu::where('slug',$slug)->where('id',$id)->first();
        $input = $request->all();

        $tittle = Input::get('name');
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
    public function delete($slug,$id)
    {
        try {
            $model = Menu::where('slug',$slug)->where('id',$id)->first();
            if ($model->delete()) {
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }
    public function parent_select(){
        $menuType = Input::get('menuType');
        $parent = Menu::where('menu_type_id', '=', $menuType)->lists('name', 'id');
        return Response::make($parent);
    }
}
