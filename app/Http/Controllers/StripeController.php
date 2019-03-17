<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Http\Requests\StripeRequest;

class StripeController extends Controller
{
    public function payment(StripeRequest $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $data = $request->all();
        $name = $data['gift'] === 'other' ? "Other - {$data['other']}" : ucfirst($data['gift']);

        $session = Session::create([
            'success_url' => url('/registry/success'),
            'cancel_url' => url('/registry'),
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'amount' => $data['amount'],
                    'quantity' => 1,
                    'currency' => 'usd',
                    'name' => $name,
                    'description' => $data['note'],
                ],
            ],
            'payment_intent_data' => [
                'description' => $data['note'],
            ],
        ], [
            'stripe_version' => '2018-11-08; checkout_sessions_beta=v1'
        ]);

        return response()->json(['id' => $session->id]);
    }
}
