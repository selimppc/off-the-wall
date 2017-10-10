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


Route::any("menu/index", [
    "as"   => "menu-index",
    "uses" => "MenuController@index"
]);

Route::any("menu/store", [
    "as"   => "menu-store",
    "uses" => "MenuController@store"
]);

Route::any("menu/show/{slug}/{id}", [
    "as"   => "menu-show",
    "uses" => "MenuController@show"
]);

Route::any("menu/edit/{slug}/{id}", [
    "as"   => "menu-edit",
    "uses" => "MenuController@edit"
]);

Route::any("menu/update/{slug}/{id}", [
    "as"   => "menu-update",
    "uses" => "MenuController@update"
]);

Route::any("menu/delete/{slug}/{id}", [
    "as"   => "menu-delete",
    "uses" => "MenuController@delete"
]);

Route::get('menu/parent-select', ['as' => 'menu.parent-select', 'uses' => 'MenuController@parent_select']);