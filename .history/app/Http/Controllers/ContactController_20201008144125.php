<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
        Validator::extend('unique_multiple', function ($attribute, $value, $parameters, $validator) {
            //if this is for an update then don't validate
            //todo: this might be an issue if we allow people to "update" one of the columns..but currently these are getting set on create only
            if (isset($validator->getData()['id'])) return true;

            // Get table name from first parameter
            $table = array_shift($parameters);

            // Build the query
            $query = DB::table($table);

            // Add the field conditions
            foreach ($parameters as $i => $field) {
                $query->where($field, $validator->getData()[$field]);
            }

            // Validation result will be false if any rows match the combination
            return ($query->count() == 0);
        });


        $validator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'documentNumber' => 'required|between:6,11|unique_multiple:contacts,documentNumber,documentType',
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
