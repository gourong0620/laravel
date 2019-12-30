<?php

namespace App\Events;

use App\Model\Lesson;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

//LessonEvent事件的文件
class LessonEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lesson;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson)
    {
        //
        $this->lesson = $lesson;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
