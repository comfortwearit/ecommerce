<?php

namespace App\Utility;

use App\Models\OtpConfiguration;
use App\Utility\MimoUtility;
use Twilio\Rest\Client;

class SendSMSUtility
{
    public static function sendSMS($to, $from, $text, $template_id)
    {
        $phone_number = preg_replace('/^(\+88|88)/', '', $to);
        $phone_number = preg_replace('/-/', '', $phone_number);
        $phone_number = preg_replace('/(\s)/', '', $phone_number);

        $success = false;

        $url        = 'https://smpp.ajuratech.com:7790/sendtext';
        $ajura_data = array(
            "apikey"        => "2e6edea5c32afdec",
            "secretkey"     => "b95eba60",
            "callerID"      => "SENDER_ID",
            "toUser"        => $phone_number,
            "messageContent"=> $text
        );

        $ch     = \curl_init();

        $data   = http_build_query($ajura_data);
        $getUrl = $url."?".$data;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);

        $result     = \curl_exec($ch);

        \curl_close($ch);

        $success    = strstr($result, 'ACCEPTD') !== false;
        return $success;
    }
}

