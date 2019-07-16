<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Billing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
	public function register(Request $request){
        $this->validate($request,[
           'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $input_data=$request->all();
        $input_data['password']=Hash::make($input_data['password']);
        User::create($input_data);
        return back()->with('message','Registered already!');
    }

    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/cart');
        }else{
            return back()->with('message','Account is not Valid!');
        }
    }

    function order(Request $request)
    {
        Billing::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        return back()->withmessage('Your Product Order Successfully !!');

    }
}
