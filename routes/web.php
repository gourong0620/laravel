<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * 将后台的路由文件统一放在admin/web文件下面加载
 */
include 'admin/web.php';
/*
Route::get('/', function () {
//    dd(app('Family')->say());
//    return view('welcome');
//    $family->say();
});
*/



/*使用laravel框架开发时常用的服务
例如：短信服务    图像处理服务     二维码生成服务
微信服务   支付服务    邮件服务

Service Contaier 是laravel框架的容器管理

Service Provider 是负责将服务注册到容器  和调用的

Contracts  锲约
*/

