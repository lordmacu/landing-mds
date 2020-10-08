<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{

    public function downloadContacts(){
        return Excel::download(new ContactsExport, 'contacts.xlsx');

    }



    public function sendContact(Request $request)
    {
        Validator::extend('unique_multiple', function ($attribute, $value, $parameters, $validator) {

            if (isset($validator->getData()['id'])) return true;
            $table = array_shift($parameters);
            $query = DB::table($table);
            foreach ($parameters as $i => $field) {
                $query->where($field, $validator->getData()[$field]);
            }
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
