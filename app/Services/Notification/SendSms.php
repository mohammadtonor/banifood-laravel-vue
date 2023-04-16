<?php

namespace App\Services\Notification;

use App\User;
use Melipayamak\MelipayamakApi;

class SendSms
{

    protected $user;
    protected $text;
    protected $code;

    public function __construct(User $user ,string $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    public static function send(User $user, string $body)
    {
        $username = env('SMS_USERNAME');
        $password = env('SMS_PASSWORD');
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms('rest');
        $to = $user->phone_number;
        $from = env('SMS_SENDER');
        $text = $body;
        $response = $sms->send($to,$from,$text,false);
        return json_decode($response);
    }


}
