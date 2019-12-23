<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User;
class Admin extends User
{
    //登录令牌
    protected $rememberTokenName = '';
}
