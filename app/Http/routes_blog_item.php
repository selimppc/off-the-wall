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


Route::any("blog_item/index", [
    "as"   => "blog_item-index",
    "uses" => "BlogItemController@index"
]);
Route::any("blog_item/add_index", [
    "as"   => "blog-item-add_index",
    "uses" => "BlogItemController@add_index"
]);

Route::any("blog_item/store", [
    "as"   => "blog_item-store",
    "uses" => "BlogItemController@store"
]);



Route::any("blog_item/show/{slug}", [
    "as"   => "blog_item-show",
    "uses" => "BlogItemController@show"
]);

Route::any("blog_item/edit/{slug}", [
    "as"   => "blog_item-edit",
    "uses" => "BlogItemController@edit"
]);

Route::any("blog_item/update/{slug}", [
    "as"   => "blog_item-update",
    "uses" => "BlogItemController@update"
]);

Route::any("blog_item/delete/{slug}", [
    "as"   => "blog_item-delete",
    "uses" => "BlogItemController@delete"
]);