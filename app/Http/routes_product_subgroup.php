<?php

Route::any("product_subgroup/index", [
    "as"   => "product-subgroup-index",
    "uses" => "ProductSubgroupController@index"
]);

Route::any("product-subgroup-store/store", [
    "as"   => "product-subgroup-store",
    "uses" => "ProductSubgroupController@store"
]);

Route::any("product-subgroup-show/show/{id}", [
    "as"   => "product-subgroup-show",
    "uses" => "ProductSubgroupController@show"
]);

Route::any("product-subgroup-edit/edit/{id}", [
    "as"   => "product-subgroup-edit",
    "uses" => "ProductSubgroupController@edit"
]);

Route::any("product-subgroup-update/{slug}", [
    "as"   => "product-subgroup-update",
    "uses" => "ProductSubgroupController@update"
]);

Route::any("product-subgroup-delete/delete/{slug}", [
    "as"   => "product-subgroup-delete",
    "uses" => "ProductSubgroupController@delete"
]);