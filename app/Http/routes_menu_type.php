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


Route::any("menu_type/index", [
    "as"   => "menu-type-index",
    "uses" => "MenuTypeController@index"
]);

Route::any("menu_type/store", [
    "as"   => "menu-type-store",
    "uses" => "MenuTypeController@store"
]);

Route::any("menu_type/show/{slug}", [
    "as"   => "menu-type-show",
    "uses" => "MenuTypeController@show"
]);

Route::any("menu_type/edit/{slug}", [
    "as"   => "menu-type-edit",
    "uses" => "MenuTypeController@edit"
]);

Route::any("menu_type/update/{slug}", [
    "as"   => "menu-type-update",
    "uses" => "MenuTypeController@update"
]);

Route::any("menu_type/delete/{slug}", [
    "as"   => "menu-type-delete",
    "uses" => "MenuTypeController@delete"
]);