<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'documentNumber' => 'required|between:6,11|unique:contacts',
            'documentType' => 'required',
            'email' => 'required|max:255',
            'knowUs' => 'max:255',
            'names' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
    
        $messages = $validator->errors();

      

        if ($validator->fails()) {
            $error = $validator->errors()->first();

            return $error;
         }
        return $request->all();
    }
}
