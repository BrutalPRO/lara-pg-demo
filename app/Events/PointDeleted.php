<?php

namespace App\Events;

use App\Models\Point;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PointDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels, InteractsWithBroadcasting;


    /**
     * @var \App\Models\Point
     */
    public $point;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Point $point)
    {
        $this->point = $point;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('points');
    }

    public function broadcastAs()
    {
        return 'remove';
    }
}
