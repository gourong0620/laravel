<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User;
class Admin extends User
{
    //登录令牌
    protected $rememberTokenName = '';

    /*
     * 定义与模型关联的数据表
     */
    protected $table = 'admins';
}
