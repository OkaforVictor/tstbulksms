<?php

namespace App\Http\Controllers;

use App\Library\SmsSenderHttpClient;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("demo.index");
    }

    public function sendMessage (Request $request) {
        $data = $request->input('data');//accepts http request

        //Instantiate SmsSenderHttpClient
        $sms_sender = new SmsSenderHttpClient($data['username'], $data['password'], $data['sender'], $data['mobiles'], $data['message']);

        //Try sending message
        $response = $sms_sender->send();


        //Validate if message was sent
        if ($response['isSuccessful']) {
            // It's successfully sent the message
            // Do the rest things here...
        } else {

            // Check error codes to determine the particular to show to the user.

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
