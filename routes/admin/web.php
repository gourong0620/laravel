<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/12/21
 * Time: 16:04
 */

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        echo 'users';
        // 匹配包含 "/admin/users" 的 URL
//        return view('welcome');
    });
});


Route::prefix('admin')->group(function(){
    Route::namespace('Admin')->group(function(){
        Route::get('login','EntryController@loginForm');
    });
});

/**
 * laravel 路由的写法
 * 第一种
 */
Route::prefix('admin')->group(function () {
    /*
     * 登录请求的方法
     * @url laravel.com/admin/login
     * @controller EntryController
     * @action loginForm
     */
    Route::get('login','Admin\EntryController@loginForm');
});


/**
 * laravel 路由的写法
 * 第二种
 * 相比较来说减少了命名看见的写法
 */
Route::prefix('admin')->namespace('Admin')->group(function () {
    /*
     * 登录请求的方法
     * @url laravel.com/admin/login
     * @controller EntryController
     * @action loginForm
     */
    Route::get('login','EntryController@loginForm');
});


/**
 * laravel 路由的写法
 * 第三种
 * 将命名看见放入闭包函数中
 */
Route::prefix('admin')->group(function () {
    /*
     * 登录请求的方法
     * @url laravel.com/admin/login
     * @controller EntryController
     * @action loginForm
     */
    Route::namespace('Admin')->group(function(){
        Route::get('login','EntryController@loginForm');
    });
});