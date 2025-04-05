<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }
}
