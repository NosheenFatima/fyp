<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save the data to the database using Query Builder
        DB::table('contacts')->insert([
            'message' => $request->input('message'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'created_at' => now(), // Laravel's helper for current timestamp
            'updated_at' => now(),
        ]);

        // Optionally, you can redirect the user with a success message
        return redirect()->back()->with('success', 'Your message has been sent!');
    }

}
