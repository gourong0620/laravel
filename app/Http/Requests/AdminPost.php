<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;//引入验证类
use Validator;
use Hash;
class AdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 判断是否有权限进行此验证
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
//        return true;//将return false 修改为true
    }

    /**
     * 添加验证规则
     * 验证原始密码和当前密码是否一致
     */
    public function addValidator()
    {
        Validator::extend('check_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value,Auth::guard('admin')->user()->password);
        });
    }
    /**
     * Get the validation rules that apply to the request.
     * 验证规则的编写
     * sometimes 表示提交的数据有此字段时才进行验证没有则不验证
     * @return array
     */
    public function rules()
    {
        $this->addValidator();
        return [
            'original_password'     => 'sometimes|required|check_password',
            'password'               => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required',
        ];
    }

    /**
     * 定义中文错误提示信息
     * @return array
     */
    public function messages()
    {
        return [
            'original_password.required' => '密码不能为空',
            'original_password.check_password' => '原始密码错误',
            'password.confirmed' => '两次密码输入不一致',
            'password.required' => '密码不能为空',
            'password_confirmation.required' => '原密码输入错误',
        ];
    }
}
