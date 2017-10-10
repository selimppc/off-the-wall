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


Route::any("blog_cat/index", [
    "as"   => "blog_cat-index",
    "uses" => "BlogCatController@index"
]);

Route::any("blog_cat/store", [
    "as"   => "blog_cat-store",
    "uses" => "BlogCatController@store"
]);

Route::any("blog_cat/show/{slug}", [
    "as"   => "blog_cat-show",
    "uses" => "BlogCatController@show"
]);

Route::any("blog_cat/edit/{slug}", [
    "as"   => "blog_cat-edit",
    "uses" => "BlogCatController@edit"
]);

Route::any("blog_cat/update/{slug}", [
    "as"   => "blog_cat-update",
    "uses" => "BlogCatController@update"
]);

Route::any("blog_cat/delete/{slug}", [
    "as"   => "blog_cat-delete",
    "uses" => "BlogCatController@delete"
]);