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

/**
 * laravel 路由的写法
 * 第四种
 * 直接调用group函数需要传递俩个参数
 * 第一个数组里面可以是前缀    命名空间   域名
 * 第二个闭包函数
 */
Route::group(array('prefix'=> 'admin','namespace' => 'Admin'),function (){
    //后台登录路由
    Route::get('login','EntryController@loginForm');
    //处理后台登录
    Route::post('login','EntryController@login');
    //首台登录后首页
    Route::get('index','EntryController@index');
    //退出登录
    Route::get('logout','EntryController@logout');
    //展示修改密码
    Route::get('changePassword','MyController@passwordForm');
    //修改密码
    Route::post('checkPassword','MyController@checkPassword');
    //标签的资源路由
    Route::resource('tag','TagController');
    //视频资源路由
    Route::resource('lesson','LessonController');
    //视频内容资源路由
    Route::resource('video','VideoController');
});
