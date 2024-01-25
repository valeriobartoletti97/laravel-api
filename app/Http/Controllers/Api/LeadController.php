<?php

namespace App\Http\Controllers\Api;

use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        /* $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }  */
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('valerio.bartoletti97@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
            'data' => $newLead
        ]);
    }
}
