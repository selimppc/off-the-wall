<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:emailsend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email_queue = EmailQueue::orderBy('id', 'desc')->first();
        try{
            Mail::send('pages.test', array(''), function ($message) use($email_queue) {
                $message->from($email_queue->sender_email, 'Affi Fact');
                $message->to($email_queue->to_email);
                $message->subject('RE: Thank you.');
            });

            // Delete from Email Queue
            $model = EmailQueue::find($email_queue->id);
            $model->delete();

            Session::flash('flash_message', 'Sent First Message to : '.$email_queue->sender_email);
        }catch (\Exception $e){
            Session::flash('flash_message_error', 'Failed to reply !');
        }

    }
}
