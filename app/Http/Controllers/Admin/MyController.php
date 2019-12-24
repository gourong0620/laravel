<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AdminPost;
use Auth;
use App\Http\Controllers\Admin\CommonController;
class MyController extends CommonController
{
    //展示修改密码界面
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }

    /*
     * 修改密码
     * 进行验证
     * 执行php artisan make:request AdminPost
     * 会创建出app/http/Requests/AdminPost文件
     */
    public function checkPassword(AdminPost $request)
    {
        $model = Auth::guard('admin')->user();
//        $password = bcrypt($request->input('password'));
        $password = bcrypt($request['password']);
        $model->password = $password;
        if($model->save()){
            session()->flash('success', '密码重置成功~');
            return redirect()->back();
        }else{
            return redirect('admin/checkPassword');
        }

    }
}
