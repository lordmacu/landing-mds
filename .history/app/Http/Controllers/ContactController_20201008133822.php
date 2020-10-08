<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {

        $validatedData = $request->validate([
            'address' => 'required|max:255',
            'documentNumber' => 'required|max:11|min6',
            'documentType' => 'required',
            'email' => 'required|max:255',
            'knowUs' => 'required|max:255',
            'names' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
        return $request->all();
    }
}
