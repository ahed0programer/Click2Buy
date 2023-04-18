<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\OtoNoti_via_SmS;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class sendingWelcomeNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $user;

    public function __construct($user)
    {
        //
        $this->user=$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Notification::sendNow(User::where("id",$this->user->id)->get(),new OtoNoti_via_SmS("+000000"));
        
    }
}
