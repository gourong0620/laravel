<?php

namespace App\Http\Controllers\Admin;
use Auth;//引入验证类s
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class EntryController
 * 1.执行php artisan make:controller Admin/EntryController创建EntryController
 * @package App\Http\Controllers\Admin
 */
class EntryController extends Controller
{
    /*
     * 初始化方法
     * 调用admin.auth middleware中间件
     * 指定login与loginForm方法不使用此中间件
     */
    public function __construct()
    {
        $this->middleware('admin.auth')->except(array('loginForm','login'));
    }

    /*
     * 展示后台登录
     * 跳转到index方法是需要进行验证
     * 使用middleware中间件进行验证
     * 执行php artisan命令
     * php artisan make:middleware AdminMiddleware
     * 将会在app/Http/Middleware/AdminMiddleware 文件
     */
    public function loginForm()
    {
        //
        return view('admin.entry.login');
    }

    /*
     * 处理后台登录
     */
    public function login(Request $request)
    {
        $status = Auth::guard('admin')->attempt(
            array(
                'username' => $request->input('username'),
                'password' => $request->input('password')
            )
        );
        if($status){
            return redirect('admin/index');
        }else{
            //发送闪存信息到后台登录界面
            return redirect('admin/login')->with('error','用户名或者密码错误');
        }
    }

    public function index()
    {
        return view('admin.entry.index');
    }

    /*
     * 退出登录
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
