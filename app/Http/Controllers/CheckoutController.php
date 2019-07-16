<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function Checkout(Request $request)
    {
        if ($request->total) {
           $total = $request->total;
            $cupon_dis = $request->cupon_dis;
            return view('frontend.checkout', compact('total', 'cupon_dis'));
        } else {
           return back();
        }
    }
}
