<?php
/**
 * Created by PhpStorm.
 * User: Mithun
 * Date: 1/16/2016
 * Time: 11:45 AM
 */

Route::group(array('modules'=>'Admin', 'namespace' => 'App\Modules\Admin\Controllers'), function() {

    Route::any('/page', [
        'as' => '/',
        'uses' => 'TestController@index'
    ]);

});