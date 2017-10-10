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


Route::any("product_category/index", [
    "as"   => "product-category-index",
    "uses" => "ProductCategoryController@index"
]);

Route::any("product_category/store", [
    "as"   => "product-category-store",
    "uses" => "ProductCategoryController@store"
]);

Route::any("product_category/add_index", [
    "as"   => "product-category-add_index",
    "uses" => "ProductCategoryController@add_index"
]);


Route::any("product_category/show/{id}", [
    "as"   => "product-category-show",
    "uses" => "ProductCategoryController@show"
]);

Route::any("product_category/edit/{slug}", [
    "as"   => "product-category-edit",
    "uses" => "ProductCategoryController@edit"
]);

Route::any("product_category/delete/{slug}", [
    "as"   => "product-category-delete",
    "uses" => "ProductCategoryController@delete"
]);

Route::any("product_category/update/{slug}", [
    "as"   => "product-category-update",
    "uses" => "ProductCategoryController@update"
]);

Route::any('product_category/image-show/{slug}', [
    'as' => 'product-category-image.image.show',
    'uses' => 'ProductCategoryController@image_show'
]);

Route::post('product_category/cat_product_group_ajax', [
    'as' => 'cat_product_group_ajax',
    'uses' => 'ProductCategoryController@cat_product_group_ajax'
]);

Route::post('product_category/cat_product_category_ajax', [
    'as' => 'cat_product_category_ajax',
    'uses' => 'ProductCategoryController@cat_product_category_ajax'
]);

Route::post('product_category/cat_product_group_ajax_update', [
    'as' => 'cat_product_group_ajax_update',
    'uses' => 'ProductCategoryController@cat_product_group_ajax_update'
]);

