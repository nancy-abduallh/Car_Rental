<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        // Get contact info from database
        $contactInfo = DB::table('tblcontactusinfo')->first();

        return view('pages.contact-us', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'contactno' => 'required|digits:10',
            'message' => 'required|string'
        ]);

        try {
            $insertId = DB::table('tblcontactusquery')->insertGetId([
                'name' => $request->fullname,
                'EmailId' => $request->email,
                'ContactNumber' => $request->contactno,
                'Message' => $request->message,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($insertId) {
                // FIX: Use correct route name 'contact.us' instead of 'pages.contact.us'
                return redirect()->route('contact.us')->with('msg', 'Query Sent. We will contact you shortly');
            } else {
                return redirect()->route('contact.us')->with('error', 'Something went wrong. Please try again');
            }
        } catch (\Exception $e) {
            return redirect()->route('contact.us')->with('error', 'Something went wrong. Please try again');
        }
    }
}