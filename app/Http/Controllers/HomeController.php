<?php

namespace App\Http\Controllers;

use App\Article;
use App\Filter;
use App\Helpers\PostSearch;
use App\Menu;
use App\SenderEmail;
use App\User;
use DB;
use Illuminate\Contracts\Logging\Log;
use Session;
//use App\Helpers\Xmlapi;
use App\Imap;
use App\Smtp;
use Illuminate\Support\Facades\Input;
use Queue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserResetPassword;
use App\Helpers\MenuHelper;




class HomeController extends Controller
{

    public function index()
    {
        if(Session::has('email')) {
            return redirect()->route('user.dashboard');
        }
        else{
            return view('user.login.login');
        }
    }

    public function user_dashboard(){

        #Log::info('Showing user profile for user: ');
        /*$menu = Menu::with('relMenu')
            ->where('menu_type_id', 1)
            #->orderBy('order', 'asc')
            ->groupBy('parent')
            ->get();
        print_r($menu);exit();*/

        /*$menu = MenuHelper::getMenu();
        print_r($menu);
        exit();*/



        $user_type = User::Where('type','admin')->first();
        return view('dashboard.index',['user_type'=>$user_type]);
    }

}