<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function admin(){
    

        $contact= new Contact();
        return view("admin")->with("contacts",contact);
    }
}
