<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cupon;

class CuponController extends Controller
{
    function viewcupon()
    {
        $cupons = Cupon::all();
        return view('admin.cupon.viewcupon', compact('cupons'));
    }

    function addcupon()
    {
        return view('admin.cupon.addcupon');
    }

    function cuponinsert(Request $request)
    {
        $request->validate([
            'cupon_code' => 'required | unique:cupons,cupon_code',
            'discount' => 'numeric | max:99',
        ]);


        Cupon::insert([
            'cupon_code' => $request->cupon_code,
            'discount' => $request->discount,
            'valid_date' => $request->valid_date,
        ]);
        return back();

    }
}
