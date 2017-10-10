<?php

Route::any("order_paid/generate_excel", [
    "as"   => "order-paid-generate_excel",
    "uses" => "OrderPaymentController@order_paid_generate_excel"
]);

Route::any("order_paid/generate_excel_current", [
    "as"   => "generate_excel_current",
    "uses" => "OrderPaymentController@generate_excel_current"
]);

Route::any("order_paid/generate_excel_approved", [
    "as"   => "generate_excel_approved",
    "uses" => "OrderPaymentController@generate_excel_approved"
]);

Route::any("order_paid/generate_excel_delivered", [
    "as"   => "generate_excel_delivered",
    "uses" => "OrderPaymentController@generate_excel_delivered"
]);

Route::any("order_paid/approved", [
    "as"   => "order-paid-approved",
    "uses" => "OrderPaymentController@order_paid_approved"
]);

Route::any("order_paid/index", [
    "as"   => "order-paid-index",
    "uses" => "OrderPaymentController@order_paid_index"
]);

Route::any("order_paid/photo-frame", [
    "as"   => "order-paid-photo-frame",
    "uses" => "OrderPaymentController@order_paid_photo_frame"
]);

Route::any("order_paid/canvas-print", [
    "as"   => "order-paid-canvas-printe",
    "uses" => "OrderPaymentController@order_paid_canvas_print"
]);

Route::any("order_paid/plain-mirror", [
    "as"   => "order-paid-plain-mirror",
    "uses" => "OrderPaymentController@order_paid_plain_mirror"
]);

Route::any("order_paid/delivered", [
    "as"   => "order-paid-delivered",
    "uses" => "OrderPaymentController@order_paid_delivered"
]);

Route::any("order_paid/show/{id}", [
    "as"   => "order-paid-show",
    "uses" => "OrderPaymentController@order_show"
]);

Route::any("order_paid/show_photo_frame/{id}", [
    "as"   => "order-paid-show-photo-frame",
    "uses" => "OrderPaymentController@order_show_photo_frame"
]);

Route::any("order_paid/show_canvas_print/{id}", [
    "as"   => "order-paid-show-canvas-print",
    "uses" => "OrderPaymentController@order_show_canvas_print"
]);

Route::any("order_paid/show_plain_mirror/{id}", [
    "as"   => "order-paid-show-plain-mirror",
    "uses" => "OrderPaymentController@order_show_plain_mirror"
]);

Route::any("order_paid/approve/{id}", [
    "as"   => "order-paid-approve",
    "uses" => "OrderPaymentController@approve"
]);

Route::any("order_paid/deliverd/{id}", [
    "as"   => "order-paid-deliverd",
    "uses" => "OrderPaymentController@deliverd"
]);



Route::any("order_paid/cancel/{id}", [
    "as"   => "order-paid-cancel",
    "uses" => "OrderPaymentController@cancel"
]);