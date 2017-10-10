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


Route::any("widget/index", [
    "as"   => "widget-index",
    "uses" => "WidgetController@index"
]);

Route::any("widget/store", [
    "as"   => "widget-store",
    "uses" => "WidgetController@store"
]);

Route::any("widget/show/{slug}", [
    "as"   => "widget-show",
    "uses" => "WidgetController@show"
]);

Route::any("widget/edit/{slug}", [
    "as"   => "widget-edit",
    "uses" => "WidgetController@edit"
]);

Route::any("widget/update/{slug}", [
    "as"   => "widget-update",
    "uses" => "WidgetController@update"
]);

Route::any("widget/delete/{slug}", [
    "as"   => "widget-delete",
    "uses" => "WidgetController@delete"
]);