<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 12/27/15
 * Time: 10:53 AM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Helpers;

class MessageSend
{

    /**
     * @param $to_email could be a single email or array_list of emails
     * @param $subject
     * @param $body
     * @param null $from_email
     * @param null $from_name
     */
    public static function email_send($to_email,$body, $from_email,$from_name = null){

        if(!$from_email)
            $from_email = Config::get('mail.from')['address'];
        if(!$from_name)
            $from_name = Config::get('mail.from')['name'];

        try{
//            echo '12345';exit;
            Mail::send('web::message_template.common', array('body'=>$body),

                function($message) use($to_email,$from_email, $from_name, $body){
                    $message->from($from_email, $from_name);
                    $message->to($to_email);
                    $message->cc($to_email);
                    $message->replyTo($from_email);
                    $message->subject('BZM Graphics');
                    $message->body($body);
                }
            );
            return true;
        }
        catch(Exception $e){
            return $e->getMessage();
        }

    }
}