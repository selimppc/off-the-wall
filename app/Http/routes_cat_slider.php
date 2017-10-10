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


Route::any("cat_slider/index", [
    "as"   => "cat-slider-index",
    "uses" => "CatSliderController@index"
]);

Route::any("cat_slider/store", [
    "as"   => "cat-slider-store",
    "uses" => "CatSliderController@store"
]);

Route::any("cat_slider/show/{slug}", [
    "as"   => "cat-slider-show",
    "uses" => "CatSliderController@show"
]);

Route::any("cat_slider/edit/{slug}", [
    "as"   => "cat-slider-edit",
    "uses" => "CatSliderController@edit"
]);

Route::any("cat_slider/update/{slug}", [
    "as"   => "cat-slider-update",
    "uses" => "CatSliderController@update"
]);

Route::any("cat_slider/delete/{slug}", [
    "as"   => "cat-slider-delete",
    "uses" => "CatSliderController@delete"
]);