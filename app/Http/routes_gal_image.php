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


Route::any("gal_image/index", [
    "as"   => "gal_image-index",
    "uses" => "GalImageController@index"
]);

Route::any("gal_image/store", [
    "as"   => "gal_image-store",
    "uses" => "GalImageController@store"
]);

Route::any("gal_image/show/{slug}", [
    "as"   => "gal_image-show",
    "uses" => "GalImageController@show"
]);

Route::any("gal_image/edit/{slug}", [
    "as"   => "gal_image-edit",
    "uses" => "GalImageController@edit"
]);

Route::any("gal_image/update/{slug}", [
    "as"   => "gal_image-update",
    "uses" => "GalImageController@update"
]);

Route::any("gal_image/delete/{slug}", [
    "as"   => "gal_image-delete",
    "uses" => "GalImageController@delete"
]);

Route::any('gal_image/image-show/{slug}', [
    'as' => 'gal_image.image.show',
    'uses' => 'GalImageController@image_show'
]);