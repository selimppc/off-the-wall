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
Route::any("product_group/index", [
    "as"   => "product-group-index",
    "uses" => "ProductGroupController@index"
]);

Route::any("product_group/store", [
    "as"   => "product-group-store",
    "uses" => "ProductGroupController@store"
]);

Route::any("product_group/show/{slug}", [
    "as"   => "product-group-show",
    "uses" => "ProductGroupController@show"
]);

Route::any("product_group/edit/{slug}", [
    "as"   => "product-group-edit",
    "uses" => "ProductGroupController@edit"
]);

Route::any("product_group/update/{slug}", [
    "as"   => "product-group-update",
    "uses" => "ProductGroupController@update"
]);

Route::any("product_group/delete/{slug}", [
    "as"   => "product-group-delete",
    "uses" => "ProductGroupController@delete"
]);