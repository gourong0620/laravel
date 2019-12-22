<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class EntryController
 * 1.执行php artisan make:controller Admin/EntryController创建EntryController
 * @package App\Http\Controllers\Admin
 */
class EntryController extends Controller
{
    public function loginForm()
    {
        return 'abc';
    }
}
