<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::all();
        return view('contact', compact('contacts'));
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone_number' => 'required|numeric|min:10|unique:contacts,phone_number',
            'address' => 'required',
            'gender' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $contact = Contact::create([

                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'country' => $request->country
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Contact Added Successfully',
            ]);
        }
    }
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id . '',
            'phone_number' => 'required|numeric|min:10|unique:contacts,phone_number,' . $id . '',
            'address' => 'required',
            'gender' => 'required|in:0,1'
            
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $contact = Contact::where('id', $id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'country' => $request->country
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Contact Updated Successfully',
            ]);
        }
    }

    public function destroy($id)
    {
        $contact = Contact::where('id', $id)->delete();
        return response(['message' => 'Deleted Contacted Successfully']);
    }
}
