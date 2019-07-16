<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Cupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    function addtocart($product_id)
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        if (Cart::where('customer_ip', $ip_address)->where('product_id', $product_id)->exists()) {
            Cart::where('customer_ip', $ip_address)->where('product_id', $product_id)->increment('product_quantity', 1);
        }
        else {
            Cart::insert([
                'customer_ip' => $ip_address,
                'product_id' => $product_id,
                'created_at' => Carbon::now()
            ]);
        }
        return back();
    }

    function cart($cupon_code = '')
    {

        if ($cupon_code == '') {
            $cart_items = Cart::where('customer_ip', $_SERVER['REMOTE_ADDR'])->get();
            $discount_amount = 0;
            return view('frontend.cart', compact('cart_items', 'discount_amount'));

        } else {
            if (Cupon::where('cupon_code', $cupon_code)->exists()) {
                if (Carbon::now()->format('Y-m-d') <= Cupon::where('cupon_code', $cupon_code)->first()->valid_date) {
                    $cart_items = Cart::where('customer_ip', $_SERVER['REMOTE_ADDR'])->get();
                    $discount_amount = Cupon::where('cupon_code', $cupon_code)->first()->discount;
                    return view('frontend.cart', compact('cart_items', 'discount_amount'));

                } else {
                    return back()->withstatus('Your Cupon Already Expired');
                }

            } else {
                return back()->withemptystatus('Your Cupon Already Expired');
            }

        }

    }


    function deletefromcart($cart_id)
    {
        Cart::find($cart_id)->delete();
        return back();
    }

    function clearcart()
    {
        Cart::where('customer_ip', $_SERVER['REMOTE_ADDR'])->delete();
        return back();
    }

    function updatecart(Request $request)
    {
        if ($request->product_quantity) {
            foreach ($request->product_quantity as $id => $item) {
                Cart::findOrFail($id)->update([
                    'product_quantity' => $item,
                ]);
            }
                return back();

        } else {
            return back();

        }

    }

}
