<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function sendemail(){
        $data_toview = array();
        $data_toview['bodymessage'] = "Silakan klik link di bawah ini untuk melakukan review terhadap pekerjaan kami.";

        $email_sender = 'project.telkomsleman@gmail.com';
        $email_pass = 'telkomsleman';
        $email_to = 'oliviadiaan12@gmail.com';

        $backup = \Mail::getSwiftMailer();

        try{
            $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
            $transport->setUsername($email_sender);
            $transport->setPassword($email_pass);

            $gmail = new Swift_Mailer($transport);

            \Mail::setSwiftMailer($gmail);

            $data['emailto'] = $email_to;
            $data['sender'] = $email_sender;

            Mail::send('email.mail', $data_toview, function($message) use ($data){
                $message->from($data['sender'], 'Telkom Sleman');
                $message->to($data['emailto'])
                ->replyTo($data['sender'], 'Telkom Sleman')
                ->subject('Link Review (Ulasan) Pemasangan IndiHome');

                echo 'The mail has been sent successfully';
            });
        } catch(\Swift_TransportException $e){
            $response = $e->getMessage();
            echo $response;
        }

        Mail::setSwiftMailer($backup);
    }
}
