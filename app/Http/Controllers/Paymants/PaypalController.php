<?php

namespace App\Http\Controllers\Paymants;

use App\Models\Order;
use Illuminate\Http\Request;
use PayPalHttp\HttpException;
use App\Http\Controllers\Controller;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{
    //
    public function create($orderId)
    {
        $order = Order::findOrFail($orderId);
        $client = app('paypal.client');
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => $order->id,
                "amount" => [
                    "value" =>  $order->amount,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('paypal.cancel', $order->id),
                "return_url" => route('paypal.return', $order->id),
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            // print_r($response);

            if ($response->statusCode == 201) {
                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {
                        return redirect()->away($link->href);
                    }
                }
            }
        } catch (HttpException $ex) {
            $order = Order::findOrFail($orderId);
            $order->update([
                'status' => 'declined'
            ]);
            return redirect()->route('home', $orderId)->with('error', 'order cancelled successfully');
        }
    }

    public function callback(Request $request, $orderId)
    {

        $client = app('paypal.client');
        $order = Order::findOrFail($orderId);
        $token = $request->query('token');


        $request = new OrdersCaptureRequest($token);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            // print_r($response);

            if ($response->statusCode == 201 && $response->result->status == 'COMPLETED') {
                $order->update([
                    'status' => 'completed'
                ]);
                return redirect()->route('home', $order->id)->with('success', 'order completed successfully');
            }
        } catch (HttpException $ex) {
            $order = Order::findOrFail($orderId);
            $order->update([
                'status' => 'declined'
            ]);
            return redirect()->route('home', $orderId)->with('error', 'order cancelled successfully');
        }
    }

    public function cancel($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update([
            'status' => 'declined'
        ]);
        return redirect()->route('home', $orderId)->with('error', 'order cancelled successfully');
    }
}
