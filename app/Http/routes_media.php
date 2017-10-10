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


Route::any("media/index", [
    "as"   => "media-index",
    "uses" => "MediaController@index"
]);

Route::any("media/store", [
    "as"   => "media-store",
    "uses" => "MediaController@store"
]);

Route::any("media/show/{id}", [
    "as"   => "media-show",
    "uses" => "MediaController@show"
]);

Route::any("media/edit/{id}", [
    "as"   => "media-edit",
    "uses" => "MediaController@edit"
]);

Route::any("media/update/{id}", [
    "as"   => "media-update",
    "uses" => "MediaController@update"
]);

Route::any("media/delete/{id}", [
    "as"   => "media-delete",
    "uses" => "MediaController@delete"
]);

Route::any('media/image-show/{id}', [
    'as' => 'media.image.show',
    'uses' => 'MediaController@image_show'
]);