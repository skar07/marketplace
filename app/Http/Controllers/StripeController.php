<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('home');
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
	  Stripe\Charge::create ([
                "amount" => $request -> total * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making payment."
        ]);

      Session::flash('success', 'Payment has been successfully processed.');

      return back();
    }
}
