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
use app\Entity\Member;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','View\MemberController@toLogin');
Route::get('/register','View\MemberController@toRegister');

Route::get('/category','View\GeekController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\GeekController@toProduct');
Route::get('/product/{product_id}', 'View\GeekController@toPdtContent');

Route::get('/cart', 'View\CartController@toCart');


Route::group(['prefix' => 'service'], function () {
    Route::get('validate_code/create', 'Service\ValidateController@create');
    Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
//     Route::post('validate_email', 'Service\ValidateController@validateEmail');
    Route::post('register', 'Service\MemberController@register');
    Route::post('login', 'Service\MemberController@login');

    Route::get('category/parent_id/{parent_id}', 'Service\GeekController@getCategoryByParentId');
    Route::get('cart/add/{parent_id}', 'Service\CartController@addCart');
    Route::get('cart/delete', 'Service\CartController@deleteCart');
});

Route::group(['middleware' => 'check.login'], function () {

    Route::get('/order_commit/{product_ids}', 'View\OrderController@toOrderCommit');
    Route::get('/order_list', 'View\OrderController@toOrderList');
});

Route::get('/or_code', 'View\OrCodeController@toOrCode');



