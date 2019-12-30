<?php

namespace App\Listeners;

use App\Events\LessonEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/*
 * 监听App\Events\LessonEvent事件
 */
class LessonListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LessonEvent  $event
     * @return void
     */

    public function handle(LessonEvent $event)
    {
        //
//        Log::alert($event->lesson->id);//事件的第一种方式
        //当一个事件有多个订阅者的时候，如果想执行完一个其他的不再执行则此方法return false
        //return false   禁止冒泡
    }


    /*
     * 监听事件的第三种方式
     */
    public function subscribe($events)
    {
        $events->listen(
            LessonEvent::class,
            LessonListener::class . '@onLessonDeleted'//回去自动调用 onLessonDeleted
        );
    }

    public function onLessonDeleted($event)
    {
        Log::alert($event->lesson);
        Log::alert($event->lesson->id);
    }
}
