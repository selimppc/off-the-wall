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


Route::any("team/index", [
    "as"   => "team-index",
    "uses" => "TeamController@index"
]);

Route::any("team/store", [
    "as"   => "team-store",
    "uses" => "TeamController@store"
]);

Route::any("team/show/{slug}", [
    "as"   => "team-show",
    "uses" => "TeamController@show"
]);

Route::any("team/edit/{slug}", [
    "as"   => "team-edit",
    "uses" => "TeamController@edit"
]);

Route::any("team/update/{slug}", [
    "as"   => "team-update",
    "uses" => "TeamController@update"
]);

Route::any("team/delete/{slug}", [
    "as"   => "team-delete",
    "uses" => "TeamController@delete"
]);