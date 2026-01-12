<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.subscribers')->with('success', 'Subscriber info deleted');
    }
}