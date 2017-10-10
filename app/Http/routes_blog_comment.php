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


Route::any("blog_comment/index/{id}", [
    "as"   => "blog_comment-index",
    "uses" => "BlogCommentController@index"
]);

Route::any("blog_comment/store", [
    "as"   => "blog_comment-store",
    "uses" => "BlogCommentController@store"
]);

Route::any("blog_comment/show/{id}", [
    "as"   => "blog_comment-show",
    "uses" => "BlogCommentController@show"
]);

Route::any("blog_comment/edit/{id}", [
    "as"   => "blog_comment-edit",
    "uses" => "BlogCommentController@edit"
]);

Route::any("blog_comment/update/{id}", [
    "as"   => "blog_comment-update",
    "uses" => "BlogCommentController@update"
]);

Route::any("blog_comment/delete/{id}", [
    "as"   => "blog_comment-delete",
    "uses" => "BlogCommentController@delete"
]);