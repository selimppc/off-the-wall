<?php

Route::any("admin_photo_frame/index", [
    "as"   => "admin-photo-frame-index",
    "uses" => "AdminPhotoFrameController@index"
]);

Route::any("admin_photo_frame/store", [
    "as"   => "admin-photo-frame-store",
    "uses" => "AdminPhotoFrameController@store"
]);


Route::any("admin_photo_frame/show/{id}", [
    "as"   => "admin-photo-frame-show",
    "uses" => "AdminPhotoFrameController@show"
]);

Route::any('admin_photo_frame/image-show/{id}', [
    'as' => 'admin-photo-frame.imageview',
    'uses' => 'AdminPhotoFrameController@image_show'
]);

Route::any("admin_photo_frame/edit/{id}", [
    "as"   => "admin-photo-frame-edit",
    "uses" => "AdminPhotoFrameController@edit"
]);

Route::any("admin_photo_frame/update/{id}", [
    "as"   => "admin-photo-frame-update",
    "uses" => "AdminPhotoFrameController@update"
]);

Route::any("admin_photo_frame/delete/{id}", [
    "as"   => "admin-photo-frame-delete",
    "uses" => "AdminPhotoFrameController@delete"
]);


/*Frame Category*/

Route::any("admin_frame_category/index", [
    "as"   => "admin-frame-category-index",
    "uses" => "AdminFrameCategoryController@index"
]);

Route::any("admin_frame_category/store", [
    "as"   => "admin-frame-category-store",
    "uses" => "AdminFrameCategoryController@store"
]);


Route::any("admin_frame_category/show/{id}", [
    "as"   => "admin-frame-category-show",
    "uses" => "AdminFrameCategoryController@show"
]);

Route::any("admin_frame_category/edit/{id}", [
    "as"   => "admin-frame-category-edit",
    "uses" => "AdminFrameCategoryController@edit"
]);

Route::any("admin_frame_category/update/{id}", [
    "as"   => "admin-frame-category-update",
    "uses" => "AdminFrameCategoryController@update"
]);

Route::any("admin_frame_category/delete/{id}", [
    "as"   => "admin-frame-category-delete",
    "uses" => "AdminFrameCategoryController@delete"
]);


/*Photo Frame*/

Route::any("admin_frame/index", [
    "as"   => "admin-frame-index",
    "uses" => "AdminFrameController@index"
]);

Route::any("admin_frame/store", [
    "as"   => "admin-frame-store",
    "uses" => "AdminFrameController@store"
]);


Route::any("admin_frame/show/{id}", [
    "as"   => "admin-frame-show",
    "uses" => "AdminFrameController@show"
]);

Route::any("admin_frame/edit/{id}", [
    "as"   => "admin-frame-edit",
    "uses" => "AdminFrameController@edit"
]);

Route::any("admin_frame/update/{id}", [
    "as"   => "admin-frame-update",
    "uses" => "AdminFrameController@update"
]);

Route::any("admin_frame/delete/{id}", [
    "as"   => "admin-frame-delete",
    "uses" => "AdminFrameController@delete"
]);

/*Canvas Edge*/

Route::any("admin_canvas_edge/index", [
    "as"   => "admin-canvas-edge-index",
    "uses" => "AdminCanvasEdgeController@index"
]);

Route::any("admin_canvas_edge/store", [
    "as"   => "admin-canvas-edge-store",
    "uses" => "AdminCanvasEdgeController@store"
]);


Route::any("admin_canvas_edge/show/{id}", [
    "as"   => "admin-canvas-edge-show",
    "uses" => "AdminCanvasEdgeController@show"
]);

Route::any("admin_canvas_edge/edit/{id}", [
    "as"   => "admin-canvas-edge-edit",
    "uses" => "AdminCanvasEdgeController@edit"
]);

Route::any("admin_canvas_edge/update/{id}", [
    "as"   => "admin-canvas-edge-update",
    "uses" => "AdminCanvasEdgeController@update"
]);

Route::any("admin_canvas_edge/delete/{id}", [
    "as"   => "admin-canvas-edge-delete",
    "uses" => "AdminCanvasEdgeController@delete"
]);


/*Mat*/

Route::any("admin_mat/index", [
    "as"   => "admin-mat-index",
    "uses" => "AdminMatController@index"
]);

Route::any("admin_mat/store", [
    "as"   => "admin-mat-store",
    "uses" => "AdminMatController@store"
]);


Route::any("admin_mat/show/{id}", [
    "as"   => "admin-mat-show",
    "uses" => "AdminMatController@show"
]);

Route::any("admin_mat/edit/{id}", [
    "as"   => "admin-mat-edit",
    "uses" => "AdminMatController@edit"
]);

Route::any("admin_mat/update/{id}", [
    "as"   => "admin-mat-update",
    "uses" => "AdminMatController@update"
]);

Route::any("admin_mat/delete/{id}", [
    "as"   => "admin-mat-delete",
    "uses" => "AdminMatController@delete"
]);

/*Glass & Backing*/

Route::any("admin_glass_backing/index", [
    "as"   => "admin-glass-backing-index",
    "uses" => "AdminGlassBackingController@index"
]);

Route::any("admin_glass_backing/store", [
    "as"   => "admin-glass-backing-store",
    "uses" => "AdminGlassBackingController@store"
]);


Route::any("admin_glass_backing/show/{id}", [
    "as"   => "admin-glass-backing-show",
    "uses" => "AdminGlassBackingController@show"
]);

Route::any("admin_glass_backing/edit/{id}", [
    "as"   => "admin-glass-backing-edit",
    "uses" => "AdminGlassBackingController@edit"
]);

Route::any("admin_glass_backing/update/{id}", [
    "as"   => "admin-glass-backing-update",
    "uses" => "AdminGlassBackingController@update"
]);

Route::any("admin_glass_backing/delete/{id}", [
    "as"   => "admin-glass-backing-delete",
    "uses" => "AdminGlassBackingController@delete"
]);

/*Printing*/

Route::any("admin_printing/index", [
    "as"   => "admin-printing-index",
    "uses" => "AdminPrintingController@index"
]);

Route::any("admin_printing/store", [
    "as"   => "admin-printing-store",
    "uses" => "AdminPrintingController@store"
]);


Route::any("admin_printing/show/{id}", [
    "as"   => "admin-printing-show",
    "uses" => "AdminPrintingController@show"
]);

Route::any("admin_printing/edit/{id}", [
    "as"   => "admin-printing-edit",
    "uses" => "AdminPrintingController@edit"
]);

Route::any("admin_printing/update/{id}", [
    "as"   => "admin-printing-update",
    "uses" => "AdminPrintingController@update"
]);

Route::any("admin_printing/delete/{id}", [
    "as"   => "admin-printing-delete",
    "uses" => "AdminPrintingController@delete"
]);


/*Plain Mirror Frame*/

Route::any("admin_plain_frame/index", [
    "as"   => "admin-plain-frame-index",
    "uses" => "AdminPlainMirrorFrameController@index"
]);

Route::any("admin_plain_frame/store", [
    "as"   => "admin-plain-frame-store",
    "uses" => "AdminPlainMirrorFrameController@store"
]);


Route::any("admin_plain_frame/show/{id}", [
    "as"   => "admin-plain-frame-show",
    "uses" => "AdminPlainMirrorFrameController@show"
]);

Route::any('admin_plain_frame/image-show/{id}', [
    'as' => 'admin-plain-frame.imageview',
    'uses' => 'AdminPlainMirrorFrameController@image_show'
]);

Route::any("admin_plain_frame/edit/{id}", [
    "as"   => "admin-plain-frame-edit",
    "uses" => "AdminPlainMirrorFrameController@edit"
]);

Route::any("admin_plain_frame/update/{id}", [
    "as"   => "admin-plain-frame-update",
    "uses" => "AdminPlainMirrorFrameController@update"
]);

Route::any("admin_plain_frame/delete/{id}", [
    "as"   => "admin-plain-frame-delete",
    "uses" => "AdminPlainMirrorFrameController@delete"
]);