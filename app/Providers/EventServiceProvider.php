<?php

namespace App\Providers;

use App\Listeners\LessonListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        /**
         * 注册Lesson事件的第一种方式
         * 可以有多个事件订阅者
         * 例如监听用户注册事件
         * 发送短信是一个订阅者      发送邮件是一个订阅者
         */
        //创建App\Events\LessonEvent
        'App\Events\LessonEvent' => [
            'App\Listeners\LessonListener',//监听App\Events\LessonEvent事件的订阅者
        ]

        /*
         * 测试
         */

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        /*
         * 事件的第二种方式通过boot方法以闭包的方式
         */
//        Event::listen('App\Events\LessonEvent',function($less){
//            Log::alert('事件的第二种方式闭包');
//        });
        //
    }

    /*
     * 事件的第三种方式
     */
    protected $subscribe = [
        LessonListener::class
    ];
}
