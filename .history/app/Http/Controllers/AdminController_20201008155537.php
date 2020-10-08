<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {


        $contact = Contact::paginate(3);
        return view("contacts")->with("contacts", $contact);
    }
}
