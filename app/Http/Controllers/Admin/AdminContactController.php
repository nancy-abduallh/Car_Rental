<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        $queries = ContactQuery::all();
        return view('admin.contact.queries', compact('queries'));
    }

    public function markAsRead($id)
    {
        $query = ContactQuery::findOrFail($id);
        $query->status = 1;
        $query->save();

        return redirect()->route('admin.contact.queries')->with('success', 'Query marked as read');
    }
}