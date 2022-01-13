<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription.index');
    }

    public function subscriptionProcess()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('subscription.success'),
                "cancel_url" => route('subscription.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "26.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
            return redirect()->route('subscription.index')->with('error', 'Something went wrong');
        } else {
            return redirect()->route('subscription.index')->with('error', 'Something went wrong');
        }
    }
}
