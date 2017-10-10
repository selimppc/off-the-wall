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


Route::any("crud/index", [
    "as"   => "crud-index",
    "uses" => "CrudController@index"
]);

Route::any("crud/store", [
    "as"   => "crud-store",
    "uses" => "CrudController@store"
]);

Route::any("crud/show/{id}", [
    "as"   => "crud-show",
    "uses" => "CrudController@show"
]);

Route::any("crud/edit/{id}", [
    "as"   => "crud-edit",
    "uses" => "CrudController@edit"
]);

Route::any("crud/update/{id}", [
    "as"   => "crud-update",
    "uses" => "CrudController@update"
]);

Route::any("crud/delete/{id}", [
    "as"   => "crud-delete",
    "uses" => "CrudController@delete"
]);