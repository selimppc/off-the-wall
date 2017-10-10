<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

use App\PoppedMessageHeader;
use App\PoppingEmail;
use App\Campaign;

class GetPoppedMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:poppedmessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Popped Message Retrieve / Fetch.';

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
        #\Log::info('I was There @ ' . \Carbon\Carbon::now());
        /* connect to gmail */
        $hostname = '{imap.googlemail.com:993/imap/ssl/novalidate-cert}INBOX';
        $username = 'devdhaka404@gmail.com';
        $password = 'etsb1234';

        try{
            $inbox = imap_open($hostname,$username,$password);
        }
        catch(\Exception $e)
        {
            Session::flash('flash_message_error', 'Enable IMAP from Gmail Settings and Enable Less Secure by this https://www.google.com/settings/security/lesssecureapps ');
            return redirect('popped-message');
        }

        /* grab email_template */
        $emails = imap_search($inbox,'UNSEEN');


        /* if email_template are returned, cycle through each... */
        if($emails) {

            //Check if Exists Popping Email and Campaing
            $popping_email = PoppingEmail::where('email', $username)->first();
            if($popping_email != null) {
                $campaign = Campaign::where('popping_email_id', $popping_email->id)->first();
                if ($campaign != null) {
                    /* begin output var */
                    $output = '';

                    /* put the newest email_template on top */
                    rsort($emails);

                    /* for every email... */
                    foreach($emails as $email_number) {

                        /* get information specific to this email */
                        $overview = imap_fetch_overview($inbox,$email_number,0);
                        $message = imap_fetchbody($inbox,$email_number,2);

                        /* Store all Emails into database */
                        $model = new PoppedMessageHeader();
                        $model->campaign_id = $campaign->id;

                        $split = explode(' <', $overview[0]->from);
                        $name = $split[0];
                        $email = rtrim($split[1], '>');

                        $model->user_email =  preg_replace('/<>*?/', '', $email);

                        $model->user_name = $popping_email->name;
                        $model->subject = $overview[0]->subject;

                        $model->save();

                    }

                    /* close the connection */
                    imap_close($inbox);

                    Session::flash('flash_message', 'Fetched Successfully !');

                }else{
                    Session::flash('flash_message_error', 'No Campaign Found!');
                }
            }else{
                Session::flash('flash_message_error', 'No Popped Emails');
            }
            /*  print_r($output); */
        }else{
            Session::flash('flash_message_error', 'No Unread Emails');
        }
    }
}
