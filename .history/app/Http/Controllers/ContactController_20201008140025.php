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
            'documentNumber' => 'required|between:10,11|unique:contacts',
            'documentType' => 'required',
            'email' => 'required|max:255',
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
        }
        return response()->json([
            'data' => $request->all(),
            'message' => 'Se ha enviado con éxito'
        ], 200);
    }
}
