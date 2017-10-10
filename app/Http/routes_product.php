<?php

Route::any("product/index", [
    "as"   => "product-index",
    "uses" => "ProductController@index"
]);

Route::any("product/store", [
    "as"   => "product-store",
    "uses" => "ProductController@store"
]);

Route::any("product/show/{slug}", [
    "as"   => "product-show",
    "uses" => "ProductController@show"
]);

Route::any("product/edit/{slug}", [
    "as"   => "product-edit",
    "uses" => "ProductController@edit"
]);

Route::any("product/duplicate/{slug}", [
    "as"   => "product-duplicate",
    "uses" => "ProductController@duplicate"
]);

Route::any("product/delete/{slug}", [
    "as"   => "product-delete",
    "uses" => "ProductController@delete"
]);

Route::any("product/update/{slug}", [
    "as"   => "product-update",
    "uses" => "ProductController@update"
]);

Route::any("product/delete/{slug}", [
    "as"   => "product-delete",
    "uses" => "ProductController@delete"
]);

Route::any('product/image-show/{slug}', [
    'as' => 'product-image.image.show',
    'uses' => 'ProductController@image_show'
]);