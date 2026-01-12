<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'FullName' => 'required|string|max:120',
            'ContactNo' => 'required',
            'Address' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:100',
            'Country' => 'nullable|string|max:100',
        ]);

        // Use query builder instead of Eloquent update method
        DB::table('tblusers')
            ->where('id', $user->id)
            ->update($request->only(['FullName', 'ContactNo', 'Address', 'City', 'Country']));

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword()
    {
        return view('pages.update-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->Password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        DB::table('tblusers')
            ->where('id', $user->id)
            ->update(['Password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password updated successfully!');
    }

}