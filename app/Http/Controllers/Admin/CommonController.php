<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
 * 父类
 */
abstract class CommonController extends Controller
{
    /*
     * 检测用户是否登录
     * 使用中间件检测
     * 执行php artisan make:middleware AdminMiddleware 创建中间件
     * 将 AdminMiddleware 中间件注册到Kernel文件
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function success($message)
    {
        return response()->json(['message' => $message,'valid' => 1]);
    }

    public function error($message)
    {
        return response()->json(['message' => $message,'valid' => 2]);
    }
}
