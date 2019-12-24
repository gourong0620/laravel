<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//将false改为true  启用中间件验证
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'sometimes|required',
        ];
    }

    /**
     * 定义中文错误提示信息
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '标签名称不能为空',
        ];
    }
}
