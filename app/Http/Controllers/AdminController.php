<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $menu_active=1;
        return view('admin.dashboard.dashboard',compact('menu_active'));
    }

    
}
