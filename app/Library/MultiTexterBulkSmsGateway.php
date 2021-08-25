<?php

namespace App\Library;

class MultiTexterBulkSmsGateway
{

    private $email = "";
    private $password = "";
    private $sender = "";
    private $mobiles = "";
    private $message = "";
    private $forcednd = "1";

    private $url_data = "";

    function __construct($email, $password, $sender, $mobiles, $message)
    {
        $this->email = $email;
        $this->password = $password;
        $this->sender = $sender;
        $this->mobiles = $mobiles;
        $this->message = $message;

        $this->url_data = array(
            'email' => $this->email,
            'password' => $this->password,
            'sender_name' => $this->sender,
            'recipients' => $this->mobiles,
            'message' => $this->message,
            "forcednd" => $this->forcednd
        );

    }

    //Make http request to a remote server
    private static function makeHttpRequest ($url, $data_string, $request_type) {

        $curl_url = curl_init($url);
        curl_setopt($curl_url, CURLOPT_CUSTOMREQUEST, $request_type);
        curl_setopt($curl_url, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl_url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_url, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));

        return json_decode(curl_exec($curl_url));
    }

    function send() {

        $data_string = json_encode($this->url_data);

        $response = self::makeHttpRequest("https://app.multitexter.com/v2/app/sms", $data_string, "POST");

        return $response;
    }

    public static function getDeliveryReport($email, $password, $msgids) {

        $url_data = array(
            'email' => $email,
            'password' => $password,
            'msgids' => $msgids
        );

        $data_string = json_encode($url_data);

        $response = self::makeHttpRequest("https://app.multitexter.com/v2/app/delivery-report", $data_string, "POST");

        return $response;
    }

    function getMobileArray() {
        return explode(",", $this->mobiles);
    }
}
