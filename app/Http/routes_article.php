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


Route::any("article/index", [
    "as"   => "article-index",
    "uses" => "ArticleController@index"
]);

Route::any("article/add_index", [
    "as"   => "article-add_index",
    "uses" => "ArticleController@add_index"
]);

Route::any("article/store", [
    "as"   => "article-store",
    "uses" => "ArticleController@store"
]);

Route::any("article/show/{slug}", [
    "as"   => "article-show",
    "uses" => "ArticleController@show"
]);


Route::any("article/edit/{slug}", [
    "as"   => "article-edit",
    "uses" => "ArticleController@edit"
]);

Route::any("article/update/{slug}", [
    "as"   => "article-update",
    "uses" => "ArticleController@update"
]);

Route::any("article/delete/{slug}", [
    "as"   => "article-delete",
    "uses" => "ArticleController@delete"
]);

Route::any("article/subarticledelete/{id}", [
    "as"   => "article-subarticledelete",
    "uses" => "ArticleController@subarticledelete"
]);

Route::any('article/image-show/{slug}', [
    'as' => 'article.image.show',
    'uses' => 'ArticleController@image_show'
]);

Route::any('textarea/image-upload', [
    'as' => 'textarea.image.upload',
    'uses' => 'ArticleController@textarea_image_upload'
]);

Route::post('article/add_subpage_ajax', [
    'as' => 'add_subpage_ajax',
    'uses' => 'ArticleController@add_subpage_ajax'
]);

Route::post('article/delete_sub_article', [
    'as' => 'delete_sub_article',
    'uses' => 'ArticleController@delete_sub_article'
]);