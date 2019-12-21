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