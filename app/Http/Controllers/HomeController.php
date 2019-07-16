<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.dashboard');

    }
    function viewcontactmessage()
    {
        $contactmessages = Contact::all();
        return view ('admin.contact.view', compact('contactmessages'));
    }

    function viewcontact($contact_id)
    {
        // if (Contact::find($contact_id)->read_status == 1 ) {
        //     Contact::find($contact_id)->update([
        //         'read_status' => true;
        // }
        // else {
        //     Contact::find($contact_id)->update([
        //         'read_status' => false;
        // }
    }
}
