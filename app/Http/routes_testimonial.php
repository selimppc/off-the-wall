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


Route::any("testimonial/index", [
    "as"   => "testimonial-index",
    "uses" => "TestimonialController@index"
]);

Route::any("testimonial/add_index", [
    "as"   => "testimonial-add-index",
    "uses" => "TestimonialController@add_index"
]);


Route::any("testimonial/store", [
    "as"   => "testimonial-store",
    "uses" => "TestimonialController@store"
]);

Route::any("testimonial/show/{slug}", [
    "as"   => "testimonial-show",
    "uses" => "TestimonialController@show"
]);

Route::any("testimonial/edit/{slug}", [
    "as"   => "testimonial-edit",
    "uses" => "TestimonialController@edit"
]);

Route::any("testimonial/update/{slug}", [
    "as"   => "testimonial-update",
    "uses" => "TestimonialController@update"
]);

Route::any("testimonial/delete/{slug}", [
    "as"   => "testimonial-delete",
    "uses" => "TestimonialController@delete"
]);