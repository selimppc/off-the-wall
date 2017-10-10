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


Route::any("social_icon/index", [
    "as"   => "social-icon-index",
    "uses" => "SocialIconController@index"
]);

Route::any("social_icon/store", [
    "as"   => "social-icon-store",
    "uses" => "SocialIconController@store"
]);

Route::any("social_icon/show/{slug}", [
    "as"   => "social-icon-show",
    "uses" => "SocialIconController@show"
]);

Route::any("social_icon/edit/{slug}", [
    "as"   => "social-icon-edit",
    "uses" => "SocialIconController@edit"
]);

Route::any("social_icon/update/{slug}", [
    "as"   => "social-icon-update",
    "uses" => "SocialIconController@update"
]);

Route::any("social_icon/delete/{slug}", [
    "as"   => "social-icon-delete",
    "uses" => "SocialIconController@delete"
]);

Route::any('social_icon/image-show/{slug}', [
    'as' => 'social_icon.image.show',
    'uses' => 'SocialIconController@image_show'
]);