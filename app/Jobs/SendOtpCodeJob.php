<?php

namespace App\Jobs;

use App\Mail\OtpCodeMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOtpCodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $token;
    /**
     * Create a new job instance.
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to("ahedsuleiman@gmail.com")->send(new OtpCodeMailable($this->token));

    }
}
