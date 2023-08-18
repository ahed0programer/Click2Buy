<?php

namespace App\Events;

use GuzzleHttp\Psr7\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class orderDeleiveredE implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $title;
    public $body;
    protected $user_id;

    public function __construct($Message,$order,$user_id)
    {
        //
        $this->title=$Message;
        $this->body =$order;
        $this->user_id=$user_id;
    }

    function broadcastAs():string
    {
        return "Order_Deleivered";
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('order-delvired'.$this->user_id),
        ];
    }
}
