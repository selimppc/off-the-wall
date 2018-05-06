<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articlesub;
use App\Pageparent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use League\Flysystem\File;
use Session;
use Input;
use App\Http\Controllers\Controller;
use App\Helpers\ImageResize;
use App\Helpers\PostSearch;

class ArticleController extends Controller
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
        $pageTitle = "Article/Page";

        if($this->isPostRequest()){
            $q = Input::get('search_term');
            /*$q = array(
                'title' =>Input::get('title_filters')
            );
            $model = new Article();
            $data = PostSearch::search($q, $model);*/
            $data = Article::where('title', 'LIKE', "%".$q."%")->paginate(20);
        }else{
            $data = Article::orderBy('id', 'DESC')->paginate(20);
        }

        return view('article.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function add_index()
    {
        $pageTitle = "Article/Page";
        $parent_id = [''=>'Please select parent']+ Pageparent::lists('title','id')->all();
        return view('article.add', [
                'pageTitle'=> $pageTitle,
                'type' => $parent_id
        ]);
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
    public function store(Requests\ArticleRequest $request)
    {
        $input = $request->all();

        $image = Input::file('featured_image');
        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;
        if(count($image)>0){
            $file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/featured_image/';
            $uploadfolder = 'uploads/';
            if ( !file_exists($uploadfolder) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($uploadfolder, 0777);
            }
            if ( !file_exists($destinationPath) ) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ($destinationPath, 0777);
            }
            if($image)
                $file_name = ArticleController::image_upload($image,$file_type_required,$destinationPath);
            if(isset($file_name) != ''){
                $input['featured_image'] = $file_name[0];
                $input['thumbnail'] = $file_name[1];
            }
        }

        DB::beginTransaction();
        try {
            //save to article table
            $article_data = Article::create($input);

            //set sub artile arrays
            $files = Input::file('post_image');
            $post_title = Input::get('post_title');
            $post_desc = Input::get('post_desc');

           
            if(!empty($post_title[0])):
                for($i=0; $i<count(Input::get('post_title')); $i++){
                    // sub article
                    $model = new Articlesub();
                    $model->article_id = @$article_data->id;
                    $model->title = @$post_title[$i];
                    $model->desc = @$post_desc[$i];

                    // files and data(s)
                    $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg');
                    $validator = Validator::make(array('file' => $files[$i]), $rules);
                    if ($validator->passes()) {
                        // Files destination
                        $destinationPath = 'uploads/sub_article/';
                        // Create folders if they don't exist
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $file_original_name = $files[$i]->getClientOriginalName();
                        $file_name = rand(11111, 99999) . $file_original_name;
                        $upload_success = $files[$i]->move($destinationPath, $file_name);

                        //model data
                        $model->image = 'uploads/sub_article/' . $file_name;
                    }
                    $model->save();
                }

                endif;
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('article-index');
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
        $data = Article::where('slug',$slug)->first();
        $all_article_data = Articlesub::where('article_id',$data->id)->get();
        return view('article.view', ['data' => $data, 'pageTitle'=> $pageTitle,'all_article_data' => $all_article_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Article::where('slug',$slug)->first();
        $parent_id = [''=>'Please select parent']+ Pageparent::lists('title','id')->all();

        $sub_page_id = Article::where('id',$data->sub_page_id)->first();
        $sub_article_data = Articlesub::where('article_id',$data->id)->get();

        return view('article.update', [
            'data' => $data,
            'type' => $parent_id,
            'sub_page_id' => $sub_page_id,
            'sub_article_data' => $sub_article_data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $model = Article::where('slug',$slug)->first();
        $input = $request->all();


        $image=Input::file('featured_image');

        $tittle = Input::get('title');
        $slug = Input::get('slug');
        $input['slug'] = $slug;

            if(count($image)>0 ) {
                $file_type_required = 'png,jpeg,jpg';
                $destinationPath = 'uploads/featured_image/';

                $uploadfolder = 'uploads/';

                if ( !file_exists($uploadfolder) ) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir ($uploadfolder, 0777);
                }
                if ( !file_exists($destinationPath) ) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir ($destinationPath, 0777);
                }

                if($image){
                    $file_name = ArticleController::image_upload($image, $file_type_required, $destinationPath);
                }
                

                if (isset($file_name) != '') {

                    //unlink(public_path()."/".$model->featured_image);
                    //unlink(public_path()."/".$model->thumbnail);

                    $input['featured_image'] = $file_name[0];
                    $input['thumbnail'] = $file_name[1];
                }
               
            }
            DB::beginTransaction();
            try {
                $model->update($input);

                //set sub artile arrays
                $files = Input::file('post_image');
                $post_title = Input::get('post_title');
                $post_desc = Input::get('post_desc');
                $post_id = Input::get('post_id');

                if(!empty($post_title[0])):
                    for($i=0; $i<count(Input::get('post_id')); $i++){
                        // sub article
                        $sub_model = Articlesub::where('id',$post_id[$i])->first();
                        $sub_model->article_id = @$model->id;
                        $sub_model->title = @$post_title[$i];
                        $sub_model->desc = @$post_desc[$i];

                        // files and data(s)
                        $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg');
                        $validator = Validator::make(array('file' => $files[$i]), $rules);
                        if ($validator->passes()) {
                            // Files destination
                            $destinationPath = 'uploads/sub_article/';
                            // Create folders if they don't exist
                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0777, true);
                            }
                            $file_original_name = $files[$i]->getClientOriginalName();
                            $file_name = rand(11111, 99999) . $file_original_name;
                            $upload_success = $files[$i]->move($destinationPath, $file_name);

                            //model data
                            $sub_model->image = 'uploads/sub_article/' . $file_name;
                        }
                        $sub_model->save();
                    }

                endif;

                $file2 = Input::file('post_image2');
                $post_title2 = Input::get('post_title2');
                $post_desc2 = Input::get('post_desc2');

                if(!empty($post_title2)){

                    $model2 = new Articlesub();
                    $model2->article_id = @$model->id;
                    $model2->title = @$post_title2;
                    $model2->desc = @$post_desc2;

                    // files and data(s)
                    $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg');
                    $validator = Validator::make(array('file' => $file2), $rules);
                    if ($validator->passes()) {
                        // Files destination
                        $destinationPath = 'uploads/sub_article/';
                        // Create folders if they don't exist
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $file_original_name = $file2->getClientOriginalName();
                        $file_name = rand(11111, 99999) . $file_original_name;
                        $upload_success = $file2->move($destinationPath, $file_name);

                        //model data
                        $model2->image = 'uploads/sub_article/' . $file_name;
                    }
                    $model2->save();
                }

                DB::commit();
                Session::flash('flash_message', "Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('flash_message_error', $e->getMessage());
            }
        return redirect()->route('article-index');
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
            $model = Article::where('slug',$slug)->first();
            if ($model->delete()) {
                if($model->featured_image != null){
                    unlink($model->featured_image);
                    unlink($model->featured_imag2);
                    unlink($model->thumbnail);
                }
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

    public function subarticledelete($id)
    {
        try {
            $model = Articlesub::where('id',$id)->first();
            if ($model->delete()) {
                if($model->featured_image != null){
                    unlink($model->image);
                }
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
        $image = Article::where('slug','=',$slug)->get();

        return view('article.view_image', [
            'pageTitle'=> $pageTitle, 'image'=>$image
        ]);
    }

    public function image_upload($image,$file_type_required,$destinationPath){
        if ($image != '') {

            $img_name = ($_FILES['featured_image']['name']);
            $random_number = rand(111, 999);

            $thumb_name = 'thumb_200x200_'.$random_number.'_'.$img_name;

            $newWidth=200;
            $targetFile=$destinationPath.$thumb_name;
            $originalFile=$image;

            $resizedImages 	= ImageResize::resize($newWidth, $targetFile,$originalFile);

            $thumb_image_destination=$destinationPath;
            $thumb_image_name=$thumb_name;

            //$rules = array('image' => 'required|mimes:png,jpeg,jpg');
            $rules = array('image' => 'required|mimes:'.$file_type_required);
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                //$destinationPath = 'uploads/slider_image/';
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = rand(11111, 99999) . $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);

                $file=array($destinationPath . $image_name, $thumb_image_destination.$thumb_image_name);

                if ($upload_success) {
                    return $file_name = $file;
                }
                else{
                    return $file_name = '';
                }
            }
            else{
                return $file_name = '';
            }
        }
    }

    public function add_subpage_ajax(){

         $input_data = Input::all();
         $type = $input_data['type'];

         $subpage_data = DB::table('article')->where('type',$type)->get();

         $select = '';
         $select.='<option value="">Select Subpage</option>';
         foreach($subpage_data as $subpage):
            $select.='<option value="'.$subpage->id.'">'.$subpage->title.'</option>';
         endforeach;

         $ajax_response_data = array(
            'status' => "1",
            'message' => "$select"
        );
        echo json_encode($ajax_response_data);
        exit;
    }

    public function delete_sub_article(){

        $input_data = Input::all();

        $sub_article_id = $input_data['sub_article_id'];

        if(DB::table('article_sub')->where('id',$sub_article_id)->delete()){

            $ajax_response_data = array(
                'status' => "1"
            );

        }else{
            $ajax_response_data = array(
                'status' => "0"
            );
        }

        echo json_encode($ajax_response_data);
        exit;
    }
}
