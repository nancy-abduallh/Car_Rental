<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class AdminContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact.update', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'address_ar' => 'nullable',
            'email' => 'required|email',
            'contactno' => 'required',
        ]);

        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'Address' => $request->address,
                'Address_ar' => $request->address_ar,
                'EmailId' => $request->email,
                'ContactNo' => $request->contactno,
            ]
        );

        return redirect()->route('admin.contact.update')->with('success', 'Info Updated successfully');
    }
}