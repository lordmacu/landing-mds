<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {

        $validatedData = $request->validate([
            'address' => 'required|max:255',
            'documentNumber' => 'required|between:6-11|unique:contacts',
            'documentType' => 'required',
            'email' => 'required|max:255',
            'knowUs' => 'max:255',
            'names' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
        return $request->all();
    }
}
