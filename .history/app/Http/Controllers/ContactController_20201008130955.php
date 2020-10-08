<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
     public function sendContact(Request $request){
         return $request->all();
     }
}
