<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'documentNumber' => 'required|between:6,11',
            'documentType' => 'required',
            'email' => 'required|max:255|unique:contacts',
            'knowUs' => 'max:255',
            'names' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);

        $messages = $validator->errors();



        if ($validator->fails()) {
            $error = $validator->errors()->all();

            return response()->json([
                'data' => $error,
                'message' => 'Hay un error en el envio de la información'
            ], 500);
        } else {
            $contact = Contact::create($request->all());
       

            return response()->json([
                'data' => [],
                'message' => 'Se ha enviado con éxito'
            ], 200);
        }
    }
}
