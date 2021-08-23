<?php

namespace App\Library;

class SmsSenderHttpClient {

    private $username = "";
    private $password = "";
    private $sender = "";
    private $mobiles = "";
    private $message = "";
    private $api_url = "";
    private $url_data = "";
    private $request = "";

    function __construct($username, $password, $sender, $mobiles, $message) {
        $this->username = $username;
        $this->password = $password;
        $this->sender = $sender;
        $this->mobiles = $mobiles;
        $this->message = $message;

        $this->api_url = "https://portal.nigeriabulksms.com/api2/";
        $this->url_data = array(
            'username'=>$this->username, 
            'password'=>$this->password, 
            'sender'=>$this->sender, 
            'mobiles'=>$this->mobiles, 
            'message'=>$this->message, 
        );

        $this->url_data = http_build_query($this->url_data);

        $this->request = $this->api_url.'?'.$this->url_data;
    }

    function send () {
        $result = file_get_contents($this->request);
        $result = json_decode($result);

        $response = null;

        if (isset($result->status) && strtoupper($result->status) == 'OK') {
            $response = array (
                'isSuccessful' => true,
                'status' => $result->status,
                'response' => $result
            );
        } else if (isset($result->error)) {
            $response = array (
                'isSuccessful' => false,
                'status' => $result->error,
                'response' => $result
            );
        } else {
            $response = array (
                'isSuccessful' => false,
                'status' => 'undetermined',
                'response' => $result
            );
        }

        return $response;
    }
}