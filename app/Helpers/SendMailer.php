<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 4/29/16
 * Time: 4:58 PM
 */

namespace App\Helpers;

use PHPMailer;

class SendMailer
{

    /**
     * @param $to_email
     * @param $to_email
     * @param $subject
     * @param $body
     * @return bool
     * @throws \phpmailerException
     */
    public static function send_mail_by_php_mailer($to_email, $to_name, $subject, $body){

        //prepare the mail with PHPMailer
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";
        //supply with your header info, body etc...

        //TODO::Enable SMTP debugging.
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "devdhaka405@gmail.com";
        $mail->Password = "etsb1234";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        //From email address and name
        $mail->From = 'asimstoys@gmail.com';
        $mail->FromName = 'Asims Toys';
        //TODO::To address and name
        $mail->addAddress('offthewallframing@gmail.com', 'OFF THE WALL'); //Recipient name is optional
        $mail->addAddress($to_email, $to_name); //Recipient name is optional
        //TODO::Address to which recipient will reply
        $mail->addReplyTo('offthewallframing@gmail.com', 'OFF THE WALL');

        //TODO::CC and BCC
        #$mail->addCC("selimppc@gmail.com");
        #$mail->addBCC("selimppc@gmail.com");
        //TODO::Provide file path and name of the attachments
        #$mail->addAttachment("file.txt", "File.txt");
        #$mail->addAttachment("images/profile.png"); //Filename is optional

        //Send HTML or Plain Text email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body; //"<i>Ho ho .. please ignore this one for your safety </i>";
        $mail->AltBody = $body;


        if(!$mail->send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        }
        else
        {
            echo "Message has been sent successfully";
            return true;
        }

    }
}