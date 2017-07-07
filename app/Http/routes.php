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
/**
 *  前端相关
 */

Route::get('/login','View\MemberController@toLogin');
Route::get('/register','View\MemberController@toRegister');

Route::get('/category','View\GeekController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\GeekController@toProduct');
Route::get('/product/{product_id}', 'View\GeekController@toPdtContent');

Route::get('/cart', 'View\CartController@toCart');

Route::group(['prefix' => 'service'], function () {
    Route::get('validate_code/create', 'Service\ValidateController@create');
    Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
    Route::post('upload/{type}', 'Service\UploadController@uploadFile');

    Route::post('register', 'Service\MemberController@register');
    Route::post('login', 'Service\MemberController@login');

    Route::get('category/parent_id/{parent_id}', 'Service\GeekController@getCategoryByParentId');
    Route::get('cart/add/{parent_id}', 'Service\CartController@addCart');
    Route::get('cart/delete', 'Service\CartController@deleteCart');
    Route::post('/add_code', 'Service\OrCodeController@toCode');
});

Route::group(['middleware' => 'check.login'], function () {
    Route::get('/order_commit/{product_ids}', 'View\OrderController@toOrderCommit');
    Route::get('/order_list', 'View\OrderController@toOrderList');
});

Route::get('/or_code', 'View\OrCodeController@toOrCode');
Route::get('/add_code', 'View\OrCodeController@toAddCode');

/**
 *  后台相关
 */

Route::group(['prefix' => 'admin'], function () {
    Route::get('index', 'Admin\IndexController@toIndex');
    Route::get('login', 'Admin\IndexController@toLogin');
    Route::get('welcome', 'Admin\IndexController@toWelcome');

    Route::group(['prefix' => 'service'], function () {
        Route::post('category/add', 'Admin\CategoryController@CategoryAdd');
        Route::post('category/edit', 'Admin\CategoryController@CategoryEdit');
        Route::post('category/del', 'Admin\CategoryController@CategoryDel');

    });

    Route::get('category', 'Admin\CategoryController@toCategory');
    Route::get('category_add', 'Admin\CategoryController@toCategoryAdd');
    Route::get('category_edit', 'Admin\CategoryController@toCategoryEdit');

    Route::get('product', 'Admin\ProductController@toProduct');
    Route::get('product_add', 'Admin\ProductController@toProductAdd');
});


