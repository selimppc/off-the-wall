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


Route::any("cat_gallery/index", [
    "as"   => "cat_gallery-index",
    "uses" => "CatGalleryController@index"
]);

Route::any("cat_gallery/store", [
    "as"   => "cat_gallery-store",
    "uses" => "CatGalleryController@store"
]);

Route::any("cat_gallery/show/{slug}", [
    "as"   => "cat_gallery-show",
    "uses" => "CatGalleryController@show"
]);

Route::any("cat_gallery/edit/{slug}", [
    "as"   => "cat_gallery-edit",
    "uses" => "CatGalleryController@edit"
]);

Route::any("cat_gallery/update/{slug}", [
    "as"   => "cat_gallery-update",
    "uses" => "CatGalleryController@update"
]);

Route::any("cat_gallery/delete/{slug}", [
    "as"   => "cat_gallery-delete",
    "uses" => "CatGalleryController@delete"
]);