<?php

namespace App\Http\Controllers;

use App\Library\MultiTexterBulkSmsGateway;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("demo.index");
    }

    public function sendMessage(Request $request)
    {
        $data = $request->input(); //accepts http request payload

        // dd($data);

        $sms_sender = new MultiTexterBulkSmsGateway($data['sender'], $data['mobiles'], $data['message']);

        //Try sending message
        $smsResponse = $sms_sender->send();

        //sms_log table row data
        $remote_msg_id = $smsResponse->msgid;
        $status = $smsResponse->status;
        $charge = $smsResponse->units;
        $sender_id = $data['sender_id'];
        $sender_name = $data['sender'];
        $message = $data['message'];
        $recipients = $data['mobiles'];

        //Do Database operation (Log SMS Details) here and return response()->json(responseObj) on success

        return response()->json($smsResponse);
    }

    public function deliveryReport(Request $request)
    {
        $data = $request->input();

        // dd($data['msgids']);


        // Check if delivery messages was saved of this message id in the local Database. If they exist, retrieve them else try using the Sms Api getDeliveryReport() function to retrieve them from the providers system, save them on the local database and return them to the frontend on success. That way we don't have to go online on the next delivery message request of this same message id.

        //This should happen while the machine is connected to the internet
        $response = MultiTexterBulkSmsGateway::getDeliveryReport($data['msgids']);

        if ($response) {

            //The user is online and delivery report data was retrieved successfully

            foreach ($response->data as $key => $value) {
                // dump("Value " . $key . ": ", $value);

                //delivery report table row data
                $sender_name = $value->sender_name;
                $message_id = $value->messageid;
                $message = $value->content;
                $dispatch_time = $value->disptachtime;
                $recipients = $value->recipient;
                $status = $value->status;
                $remote_msg_id = $value->remotemsgid;

                //save/update the delivery_report_log table (save if message_id isn't existing else update the existing records)
            }
        } else {

            //The user is not online or a delivery report was not pulled somehow
            // so pull delivery from our local database if it exists.

            // Hence do delivery report data retrieving from the local db here...

        }

        return response()->json($response);
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
