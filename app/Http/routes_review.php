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


// User List...
Route::any('reviews/all-list', [
    'as' => 'all-list',
    'uses' => 'ReviewsController@all_list'
]);

Route::any("reviews/confirm/{id}", [
    "as"   => "reviews-confirm",
    "uses" => "ReviewsController@confirm"
]);

Route::any("reviews/delete/{id}", [
    "as"   => "reviews-delete",
    "uses" => "ReviewsController@delete"
]);