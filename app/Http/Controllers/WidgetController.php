<?php
namespace App\Http\Controllers;
use App\Menu;
use App\Widget;
use App\WidgetMenu;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;
use App\Http\Controllers\Controller;
class WidgetController extends Controller
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
        $pageTitle = "Widget";

        if($this->isPostRequest()){
            $q = Input::get('search_term');
            $data = Widget::where('title', 'LIKE', "%".$q."%")->paginate(20);
            $widget_menu =  [

            ];
            $menu = Menu::get();
        }else{
            $data = Widget::orderBy('id', 'DESC')->paginate(10);
            $widget_menu =  [

            ];
            $menu = Menu::get();
        }

        return view('widget.index', ['data' => $data, 'pageTitle'=> $pageTitle,'menu'=>$menu,'widget_menu'=>$widget_menu]);
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
    public function store(Requests\WidgetRequest $request)
    {
        $input = $request->all();
        if(isset($input['menu_id'])){
            $menu = $input['menu_id'];
        }
        else{
            $menu = null;
        }
        $input['slug'] = str_slug(strtolower($input['title']));
        $widget_exists = Widget::where('slug',$input['slug'])->exists();

        if($widget_exists){
            Session::flash('flash_message_error',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                $widget = Widget::create($input);
                if(!empty($menu)) {
                    foreach ($menu as $menu_id) {
                        $widget_menu = new WidgetMenu();
                        $widget_menu->menu_id = $menu_id;
                        $widget_menu->widget_id = $widget->id;

                        DB::beginTransaction();
                        try {
                            $widget_menu->save(); // store / update / code here
                            DB::commit();
                        } catch (Exception $ex) {
                            //If there are any exceptions, rollback the transaction`
                            DB::rollback();
                            Session::flash('flash_message_error', $ex->getMessage());
                        }
                    }
                }
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
        $data = Widget::where('slug',$slug)->first();
        $widget_menu = WidgetMenu::where('widget_id','=',$data['id'])->get();
        return view('widget.view', ['data' => $data, 'pageTitle'=> $pageTitle,'widget_menu'=>$widget_menu]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Widget::where('slug',$slug)->first();
        $widget_menu = WidgetMenu::where('widget_id','=',$data['id'])->lists('menu_id')->toArray();
        $menu = Menu::get();

        return view('widget.update', ['data' => $data,'menu'=>$menu,'widget_menu'=>$widget_menu]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\WidgetRequest $request, $slug)
    {

        $model = Widget::where('slug',$slug)->first();
        //delete previous data form widget_menu table
                    DB::beginTransaction();
                    try {
                        WidgetMenu::where('widget_id','=',$model['id'])->delete(); // store / update / code here
                        DB::commit();
                    } catch (Exception $e) {
                        //If there are any exceptions, rollback the transaction`
                        DB::rollback();
                        Session::flash('flash_message_error', "Invalid Request");
                    }
        //update new input in widget_menu-----------------
        $input = $request->all();
        $input['slug'] = str_slug(strtolower($input['title']));

        if(isset($input['menu_id'])){
            $menu = $input['menu_id'];
        }
        else{
            $menu = null;
        }
        if(!empty($menu)) {
            foreach ($menu as $menu_id) {
                $widget_menu = new WidgetMenu();
                $widget_menu->menu_id = $menu_id;
                $widget_menu->widget_id = $model['id'];
                try {
                    $widget_menu->save(); // store / update / code here
                    DB::commit();
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('flash_message_error', "Invalid Request");
                }
            }
        }
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
        DB::beginTransaction();
        try {
            $model = Widget::where('slug',$slug)->first();
            $model->delete();
            DB::commit();
            Session::flash('flash_message', " Successfully Deleted.");
        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
        }
        if(WidgetMenu::where('widget_id',$model['id'])->exists()){
            try{
                DB::commit();
                WidgetMenu::where('widget_id',$model['id'])->delete();
            }
            catch(\Exception $e){
                DB::rollback();
                Session::flash('flash_message_error',$e->getMessage() );
            }
        }
        return redirect()->back();
    }
}