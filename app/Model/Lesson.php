<?php

namespace App\Model;

use App\Events\lessonDeleted;
use App\Events\LessonEvent;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /*
     * 声明与video模型的一对多关系
     */
    public function videos()
    {
        return $this->hasMany('App\Model\Video','lesson_id','id');
    }

    /**
     * @var array
     * 建立模型事件与自定义事件类的映射
     */
    protected $dispatchesEvents = [
        'deleted' => LessonEvent::class
    ];
}
