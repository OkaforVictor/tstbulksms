<?php

namespace App\Http\Controllers;

use App\Library\MultiTexterBulkSmsGateway;
use App\Library\NigeriaBulkSmsGateway;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;

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

        //Do Database operation (Log SMS Details) here and return response()->json(responseObj) on success

        return response()->json($smsResponse);
    }

    public function deliveryReport (Request $request) {
        $data = $request->input();

        // dd($data['msgids']);

        // Check if delivery messages was saved of this message id in the local Database. If they exist, retrieve them else try using the Sms Api getDeliveryReport() function to retrieve them from the providers system, save them on the local database and return them to the frontend on success. That way we don't have to go online on the next delivery message request of this same message id.

        $response = MultiTexterBulkSmsGateway::getDeliveryReport($data['msgids']);

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
