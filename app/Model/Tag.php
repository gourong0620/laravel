<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
/*
 * 执行php artisan make:model Model/Tag -m
 * 会创建出App/Model/Tag.php与database/migrations/2019_12_24_025849_create_tags_table.php文件
 * 执行 php artisan migrate会创建处tag数据表
 */
class Tag extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
}
