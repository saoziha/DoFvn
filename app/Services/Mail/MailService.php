<?php
namespace App\Services\Mail;

use Mail;

class MailService
{
    public static function sendMail($name, $mailTo, $title, $content,$header='')
    {
        $data = ['name' => $name,'content' => $content,'title' => $title,'mail' => $mailTo,'header'=>$header];
        Mail::send('mail', $data, function ($message) use ($data) {
            $message->to($data['mail'], $data['name'])
                    ->subject($data['title'])
                    ->getSwiftMessage()
                    ->getHeaders()
                    ->addTextHeader($data['header']);
        });
        if (Mail::failures()) {
            return false;
        } else {
            return true;
        }
    }
}
