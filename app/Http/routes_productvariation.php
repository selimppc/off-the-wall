<?php

Route::any("productvariation/index/{slug}", [
    "as"   => "productvariation-index",
    "uses" => "ProductvariationController@index"
]);

Route::any("productvariation/store", [
    "as"   => "productvariation-store",
    "uses" => "ProductvariationController@store"
]);

Route::any("productvariation/show/{slug}", [
    "as"   => "productvariation-show",
    "uses" => "ProductvariationController@show"
]);

Route::any("productvariation/edit/{slug}", [
    "as"   => "productvariation-edit",
    "uses" => "ProductvariationController@edit"
]);

Route::any("productvariation/update/{slug}", [
    "as"   => "productvariation-update",
    "uses" => "ProductvariationController@update"
]);

Route::any("productvariation/delete/{id}", [
    "as"   => "productvariation-delete",
    "uses" => "ProductvariationController@delete"
]);