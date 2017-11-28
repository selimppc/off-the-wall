<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('modules'=>'Web', 'namespace' => 'App\Modules\Web\Controllers'), function() {
    //Your routes belong to this module.

/*Route::any('admin', [
    'as' => 'admin',
    'uses' => 'HomeController@user_login'
]);*/

Route::any('web', [
    'as' => 'web',
    'uses' => 'WebController@web_index'
]);

Route::any('custom-picture-frame',[
		'as' => 'custom-picture-frame',
		'uses' => 'PhotoFrameController@photo_frame'
	]);

Route::any('canvas-print',[
		'as' => 'canvas-print',
		'uses' => 'PhotoFrameController@canvas_print'
	]);

Route::any('canvas-stretching',[
		'as' => 'canvas-stretching',
		'uses' => 'PhotoFrameController@canvas_stretching'
	]);

Route::any('only-printing',[
		'as' => 'only-printing',
		'uses' => 'PhotoFrameController@only_printing'
	]);

Route::post('add-to-cart-canvas-print',[
		'as' => 'add-to-cart-canvas-print',
		'uses' => 'PhotoFrameController@canvas_print_add_to_cart'
	]);

Route::post('add-to-cart-only-print',[
		'as' => 'add-to-cart-only-print',
		'uses' => 'PhotoFrameController@only_printing_add_to_cart'
	]);

Route::post('add-to-cart-only-streaching',[
		'as' => 'add-to-cart-only-streaching',
		'uses' => 'PhotoFrameController@only_streaching_add_to_cart'
	]);

Route::any('plain-mirror-add-to-cart',[
		'as' => 'plain-mirror-add-to-cart',
		'uses' => 'PhotoFrameController@plain_mirror_add_to_cart'
	]);

Route::any('plain-mirror',[
		'as' => 'plain-mirror',
		'uses' => 'PhotoFrameController@plain_mirror'
	]);

Route::any('frame-it-plain-mirror',[
		'as' => 'frame-it-plain-mirror',
		'uses' => 'PhotoFrameController@plain_mirror_frame_it'
	]);

Route::any('photo-frame-add-to-cart',[
		'as' => 'photo-frame-add-to-cart',
		'uses' => 'PhotoFrameController@add_to_cart'
	]);

Route::any('apps',[
		'as' => 'apps',
		'uses' => 'WwwController@apps'
	]);

Route::any('apps/photo-upload',[
		'as' => 'apps-photo-upload',
		'uses' => 'WwwController@apps_photo_upload'
	]);

Route::any("apps/photo-store", [
    "as"   => "apps-photos-store",
    "uses" => "WwwController@phototempstore"
]);

Route::any("apps/photo-edit", [
    "as"   => "apps-photo-edit",
    "uses" => "WwwController@photoedit"
]);

Route::any("apps/custom-size", [
    "as"   => "apps-custom-size",
    "uses" => "WwwController@customsize"
]);

Route::any("apps/photo_upload", [
    "as"   => "apps-photo-resize",
    "uses" => "WwwController@photoresize"
]);

Route::any("apps/frame_photo", [
    "as"   => "apps-photo-frame",
    "uses" => "WwwController@photoframe"
]);

Route::any('/', [
    'as' => 'home-page',
    'uses' => 'WwwController@home_page'
]);

Route::any('picture-framer',[
	'as' => 'picture-framer',
	'uses' => 'WwwController@about'
]);

Route::any('terms-and-conditions',[
	'as' => 'terms-and-conditions',
	'uses' => 'WwwController@termscondition'
]);

Route::any('privacy-security',[
	'as' => 'privacy-security',
	'uses' => 'WwwController@privacy'
]);

Route::any('picture-framing-rockdale',[
	'as' => 'picture-framing-rockdale',
	'uses' => 'WwwController@contact'
]);

Route::any('delivery-installation',[
	'as' => 'delivery-installation',
	'uses' => 'WwwController@delivery'
]);

Route::any('wholesale-customers',[
	'as' => 'wholesale-customers',
	'uses' => 'WwwController@wholesell'
]);

Route::any('splashbacks',[
	'as' => 'splashbacks',
	'uses' => 'WwwController@splashbacks'
]);

Route::any('contactsubmit',[
		'as' => 'contactsubmit',
		'uses' => 'WwwController@contactsubmit'
	]);

Route::any('mycart',[
		'as' => 'mycart',
		'uses' => 'CartController@mycart'
	]);

Route::any('order/test',[
		'as' => 'order_test',
		'uses' => 'OrderController@test'
	]);

Route::any('order/update_cart',[
		'as' => 'update_cart',
		'uses' => 'OrderController@update_cart'
	]);

Route::any('order/update_cart_photo_frame',[
		'as' => 'update_cart_photo_frame',
		'uses' => 'OrderController@update_cart_photo_frame'
	]);

Route::any('order/update_cart_canvas_print',[
		'as' => 'update_cart_canvas_print',
		'uses' => 'OrderController@update_cart_canvas_print'
	]);

Route::any('order/update_cart_canvas_stretching_only',[
		'as' => 'update_cart_canvas_stretching_only',
		'uses' => 'OrderController@update_cart_canvas_stretching_only'
	]);

Route::any('order/update_cart_canvas_only_printing',[
		'as' => 'update_cart_canvas_only_printing',
		'uses' => 'OrderController@update_cart_canvas_only_printing'
	]);

Route::any('order/update_cart_plain_mirror',[
		'as' => 'update_cart_plain_mirror',
		'uses' => 'OrderController@update_cart_plain_mirror'
	]);

Route::any('order/remove_cart',[
		'as' => 'remove_cart',
		'uses' => 'OrderController@remove_cart'
	]);

Route::any('order/remove_cart_canvas_stretching_only',[
		'as' => 'remove_cart_canvas_stretching_only',
		'uses' => 'OrderController@remove_cart_canvas_stretching_only'
	]);

Route::any('order/remove_cart_canvas_print',[
		'as' => 'remove_cart_canvas_print',
		'uses' => 'OrderController@remove_cart_canvas_print'
	]);

Route::any('order/remove_cart_photo_frame',[
		'as' => 'remove_cart_photo_frame',
		'uses' => 'OrderController@remove_cart_photo_frame'
	]);

Route::any('order/remove_cart_canvas_only_print',[
		'as' => 'remove_cart_canvas_only_print',
		'uses' => 'OrderController@remove_cart_canvas_only_print'
	]);

Route::any('order/remove_cart_plain_mirror',[
		'as' => 'remove_cart_plain_mirror',
		'uses' => 'OrderController@remove_cart_plain_mirror'
	]);

Route::post('order/add_to_cart',[
		'as' => 'order-add_to_cart',
		'uses' => 'OrderController@add_to_cart'
	]);

Route::any("order/billingaddress", [
    "as"   => "order-billing-address",
    "uses" => "OrderController@billingaddress"
]);

Route::any("order/customerbillingdetail", [
    "as"   => "customer-billing-detail",
    "uses" => "OrderController@customersavebilling"
]);

Route::any("order/deliverydetails", [
    "as"   => "order-delivery-detail",
    "uses" => "OrderController@deliverydetails"
]);

Route::any("order/customerdeliverydetails", [
    "as"   => "customer-delivery-detail",
    "uses" => "OrderController@savedeliverydetails"
]);

Route::any("order/customerdeliverydetails", [
    "as"   => "customer-delivery-detail",
    "uses" => "OrderController@savedeliverydetails"
]);

Route::any('order/confirm',[
		'as' => 'order-check-order',
		'uses' => 'OrderController@orderconfirm'
	]);

Route::any('order/thank-you',[
		'as' => 'order-thank-you',
		'uses' => 'OrderController@thankyou'
	]);

Route::any('order/saveorder',[
		'as' => 'order-thank-you',
		'uses' => 'OrderController@saveorder'
	]);

Route::any('customer-reviews',[
		'as' => 'customer-reviews',
		'uses' => 'CustomerreviewsController@customerreviews'
	]);

Route::any('customerreviews-store',[
		'as' => 'customerreviews-store',
		'uses' => 'CustomerreviewsController@customerreviewsstore'
	]);

Route::any('email-to-a-friend-store',[
		'as' => 'email-to-a-friend-store',
		'uses' => 'WwwController@emailtofriendstore'
	]);

Route::any('{main_slug}/{sub_slug}',[
		'as' => 'product_category',
		'uses' => 'ProductCategoryController@couple'
]);

Route::any('{product_slug}',[
		'as' => 'product',
		'uses' => 'ProductController@index'
	]);

});

