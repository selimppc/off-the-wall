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


Route::any("skills/index", [
    "as"   => "skills-index",
    "uses" => "SkillsController@index"
]);

Route::any("skills/add-index", [
    "as"   => "skills-add-index",
    "uses" => "SkillsController@add_index"
]);

Route::any("skills/store", [
    "as"   => "skills-store",
    "uses" => "SkillsController@store"
]);

Route::any("skills/show/{slug}", [
    "as"   => "skills-show",
    "uses" => "SkillsController@show"
]);

Route::any("skills/edit/{slug}", [
    "as"   => "skills-edit",
    "uses" => "SkillsController@edit"
]);

Route::any("skills/update/{slug}", [
    "as"   => "skills-update",
    "uses" => "SkillsController@update"
]);

Route::any("skills/delete/{slug}", [
    "as"   => "skills-delete",
    "uses" => "SkillsController@delete"
]);