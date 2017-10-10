<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*Route::any('webmaster', [
    'as' => 'webmaster',
    'uses' => 'UserController@web_master'
]);*/

Route::any('admin', [
    'as' => 'admin',
    'uses' => 'UserController@user_login'
]);

Route::any('user-login', [
    'as' => 'user-login',
    'uses' => 'UserController@user_login'
]);
Route::any("login", [
    "as"   => "login",
    "uses" => "UserController@login"
]);

Route::any('user/forgot-password', [
    'as' => 'user.forgot-password',
    'uses' => 'AdminController@forgot_password'
]);

Route::any('user/password_reminder_mail',
    ['as'=>'user.password_reminder_mail',
        'uses'=>'AdminController@user_password_reminder_mail']);

Route::any('user/password_reset_confirm/{reset_password_token}',
    ['as'=>'user/password_reset_confirm',
        'uses'=>'AdminController@user_password_reset_confirm']);

Route::any('user/save-new-password',
    ['as'=>'user/save-new-password',
        'uses'=>'AdminController@save_new_password']);

Route::any('home_reminder_mail', [
    'as' => 'home_reminder_mail',
    'uses' => 'HomeController@home_reminder_mail'
]);


Route::any('user-activation/{remember_token}',
    ['as'=>'user.user-activation',
        'uses'=>'UserController@user_activation']);


Route::any('generate_password/{remember_token}',
    ['as'=>'generate_password',
        'uses'=>'AdminController@generate_password']);

Route::any('user/save_password',
    ['as'=>'user/save_password',
        'uses'=>'AdminController@save_password']);



//user activation for signup...

Route::any('user-confirmation/{remember_token}',
    ['as'=>'user.user-confirmation',
        'uses'=>'AdminController@user_confirm']);

Route::any('user-signup/store/{user_id}', [
    'as' => 'user-signup.store',
    'uses' => 'UserController@store'
]);

Route::any('user-signup/store-signup', [
    'as' => 'user-signup.store-signup',
    'uses' => 'UserController@store_signup'
]);


Route::any("user/sign-up", [
    "as"   => "user.sign-up",
    "uses" => "UserController@sign_up"
]);

Route::group(['middleware' => 'auth'], function()
{

    @include('routes_crud.php');
    @include('routes_team.php');
    @include('routes_skills.php');
    @include('routes_testimonial.php');
    @include('routes_social_icon.php');
    @include('routes_cat_gallery.php');
    @include('routes_cat_slider.php');
    @include('routes_gal_image.php');
    @include('routes_slider_image.php');
    @include('routes_article.php');
    @include('routes_review.php');
    @include('routes_product_category.php');
    @include('routes_product_group.php');
    @include('routes_product_subgroup.php');
    @include('routes_product.php');
    @include('routes_productvariation.php');
    @include('routes_blog_cat.php');
    @include('routes_blog_item.php');
    @include('routes_menu.php');
    @include('routes_menu_type.php');
    @include('routes_blog_comment.php');
    @include('routes_media.php');
    @include('routes_widget.php');
    @include('routes_order_payment.php');
    @include('routes_photo_frame.php');


/*Route::get('/', [
    'as' => 'web',
    'uses' => 'WebController@web_index'
]);*/

Route::any('user/dashboard', [
    'as' => 'user.dashboard',
    'uses' => 'HomeController@user_dashboard'
]);

Route::any('user/request', [
    'as' => 'user.request',
    'uses' => 'AdminController@request'
]);

Route::any('user/send-request', [
    'as' => 'user.send-request',
    'uses' => 'AdminController@user_request_mail'
]);


Route::any('user/logout', [
    'as' => 'user.logout',
    'uses' => 'UserController@logout'
]);

// User List...
Route::any('user/user-list', [
    'as' => 'user.user-list',
    'uses' => 'AdminController@user_list'
]);

Route::any('user/create/{id}', [
    'as' => 'user.create',
    'uses' => 'AdminController@create'
]);

Route::any('user/store/{id}', [
    'as' => 'user.store',
    'uses' => 'AdminController@store'
]);


Route::any('user/show-data/{id}', [
    'as' => 'user.show.data',
    'uses' => 'AdminController@show'
]);

Route::any('user/edit/{id}', [
    'as' => 'user.edit',
    'uses' => 'AdminController@edit'
]);

Route::any('user/update/{id}', [
    'as' => 'user.update',
    'uses' => 'AdminController@update'
]);

Route::any('user/destroy/{id}', [
    'as' => 'user.destroy',
    'uses' => 'AdminController@destroy'
]);

Route::any('create/new-user',
    ['as'=>'create.new-user',
        'uses'=>'AdminController@create_new_user']);

/*
* -------------------  User Profile Area Start------------------------
 */

 //user password change
    Route::any('user/change-user-password-view', [
        'as' => 'user.change_user-password-view',
        'uses' => 'UserController@change_user_password_view'
    ]);
 //user password change end
    //user profile picture
    Route::any('user/profile-picture-view', [
        'as' => 'user.profile-picture-view',
        'uses' => 'UserController@profile_picture_view'
    ]);

    Route::any('user/profile-picture-save', [
        'as' => 'user.profile-picture-save',
        'uses' => 'UserController@profile_picture_save'
    ]);
    //user profile picture end

Route::any("user/profile-info", [
    "as"   => "user.profile-info",
    "uses" => "UserController@profile"
]);



Route::any('user-signup/update/{id}', [
    'as' => 'user-signup.update',
    'uses' => 'UserController@updateProfile'
]);

Route::any('user-signup/reset_password/{id}',
    ['as'=>'user-signup.reset_password',
        'uses'=>'UserController@password_change_view']);

Route::any('user-signup/update_password/{id}', [
    'as' => 'user-signup.update_password',
    'uses' => 'UserController@update_passwd'
]);



/*
* -------------------  User Profile Area End ------------------------
 */

/*
* -------------------  User List Area Start------------------------
*/

Route::any('user/inactive/{id}', [
    'as' => 'user.inactive',
    'uses' => 'AdminController@status_inactive'
]);

Route::any('user/active/{id}', [
    'as' => 'user.active',
    'uses' => 'AdminController@status_active'
]);


Route::any('user/status_active_mail/{remember_token}',
    ['as'=>'user/status_active_mail',
    'uses'=>'UserController@active_user_login']);

//Central Settings...

Route::any('discounts',
    ['as'=>'discounts',
    'uses'=>'CentralSettingsController@discounts']);

Route::any('discounts/update/{id}', [
'as' => 'discounts.update',
'uses' => 'CentralSettingsController@discounts_update'
]);

Route::any('central-settings',
    ['as'=>'central-settings',
    'uses'=>'CentralSettingsController@central_settings']);

Route::any('central-settings/edit/{id}', [
'as' => 'central-settings.edit',
'uses' => 'CentralSettingsController@edit'
]);

Route::any('central-settings/update/{id}', [
'as' => 'central-settings.update',
'uses' => 'CentralSettingsController@update'
]);

Route::any('central-settings/show/{id}', [
'as' => 'central-settings.show',
'uses' => 'CentralSettingsController@show'
]);

});