<?php

namespace App\Jobs;

use App\User;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Queue;
use Illuminate\Bus\Queueable;



class SendReminderEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    //protected $user;
    public $sender;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //$this->user = $user;
        $this->sender=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->queue('imap.mail', ['user' => $this->sender], function ($message) {
            $message->from('devdhaka404@gmail.com', 'Mail Notification');
            $message->to('devdhaka404@gmail.com');
            $message->subject('Notification');
        });
        //$this->user->reminders()->create(...);
    }
}
