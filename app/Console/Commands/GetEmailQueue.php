<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\PoppedMessageHeader;
use App\SenderEmail;
use App\PoppingEmail;
use App\Campaign;
use Illuminate\Support\Facades\DB;
use App\EmailQueue;

class GetEmailQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:emailqueue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email Queue for Popped and Queue.';

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
        $popped_message = PoppedMessageHeader::with(['relCampaign.relMessage.relSubMessage' => function ($query) {
            #$query->having('start_time', '<=', '2015-10-13 12:35:00');
            #$query->having('end_time', '>=', '2015-10-13 12:35:00');
        }])->get();


        foreach($popped_message as $values){

            $campaign = $values->relCampaign;
            $message = $values->relCampaign->relMessage;
            #$sender_email = $values->relSenderEmail;
            $sender_email =  SenderEmail::where('campaign_id', $campaign->id)->get();

            DB::beginTransaction();
            try {
                $i = 0;
                foreach ($message as $msg){
                    //Sub Messages
                    $sub_message = $msg->relSubMessage;

                    // Email Queue
                    $model = new EmailQueue();
                    $model->popped_message_id = $values->id;
                    $model->sub_message_id = $sub_message[$i]['id'];
                    $model->followup_message_id = '2';
                    $model->send_time = date("Y-m-d h:i:s", time() + 30);
                    $model->sender_email = $sender_email[$i]['email'];
                    $model->to_email = $values->user_email;
                    $model->save();

                    //Popping Status in sender_email table
                    /*$sm_model = SenderEmail::findOrNew($sender_email[$i]['id']);
                    $sm_model->popping_status = 'true';
                    $sm_model->save();*/

                    $i++;
                }
                DB::commit();
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
            }
        }

    }
}
