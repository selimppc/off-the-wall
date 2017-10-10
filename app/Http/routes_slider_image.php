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


Route::any("slider_image/index", [
    "as"   => "slider-image-index",
    "uses" => "SliderImageController@index"
]);

Route::any("slider_image/store", [
    "as"   => "slider-image-store",
    "uses" => "SliderImageController@store"
]);
/*Route::any('slider_image/image-show/{id}', [
    'as' => 'slider-image.image.show',
    'uses' => 'SliderImageController@image_show'
]);*/

Route::any('slider_image/image-show/{slug}', [
    'as' => 'slider_image.image.show',
    'uses' => 'SliderImageController@image_show'
]);

Route::any("slider_image/show/{slug}", [
    "as"   => "slider-image-show",
    "uses" => "SliderImageController@show"
]);

Route::any("slider_image/edit/{slug}", [
    "as"   => "slider-image-edit",
    "uses" => "SliderImageController@edit"
]);

Route::any("slider_image/update/{slug}", [
    "as"   => "slider-image-update",
    "uses" => "SliderImageController@update"
]);

Route::any("slider_image/delete/{slug}", [
    "as"   => "slider-image-delete",
    "uses" => "SliderImageController@delete"
]);

