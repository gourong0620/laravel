<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /*
     * 定义多对一关系
     */
    public function lesson()
    {
        return $this->belongsTo('App\Model\Lesson','lesson_id','id');
    }
}
