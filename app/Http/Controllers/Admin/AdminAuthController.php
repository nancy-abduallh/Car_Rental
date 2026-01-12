<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Login process
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('UserName', $request->username)->first();

        if (!$admin) {
            return back()->withErrors(['username' => 'Invalid credentials.']);
        }

        $inputPassword = $request->password;

        // CASE 1: PASSWORD IS ALREADY BCRYPT
        if (Hash::needsRehash($admin->Password) === false && Hash::check($inputPassword, $admin->Password)) {
            $this->setAdminSession($admin);
            return redirect()->route('admin.dashboard');
        }

        // CASE 2: PASSWORD IS MD5 (OLD SYSTEM)
        if ($admin->Password === md5($inputPassword)) {

            // UPDATE TO BCRYPT AUTOMATICALLY
            $admin->Password = Hash::make($inputPassword);
            $admin->save();

            $this->setAdminSession($admin);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    /**
     * Set admin session
     */
    private function setAdminSession($admin)
    {
        Session::put('admin_id', $admin->id);
        Session::put('admin_username', $admin->UserName);
        Session::put('alogin', $admin->UserName);
    }

    /**
     * Logout
     */
    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }

    /**
     * Show change-password form
     */
    public function showChangePasswordForm()
    {
        return view('admin.auth.change-password');
    }

    /**
     * Handle password change
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'required|same:newpassword'
        ]);

        $admin = Admin::where('UserName', Session::get('admin_username'))->first();

        if (!$admin) {
            return back()->withErrors(['password' => 'Something went wrong.']);
        }

        // Validate current password (bcrypt only)
        if (!Hash::check($request->password, $admin->Password)) {
            return back()->withErrors(['password' => 'Your current password is not valid.']);
        }

        // Update password
        $admin->Password = Hash::make($request->newpassword);
        $admin->updationDate = now();
        $admin->save();

        return back()->with('success', 'Your Password successfully changed');
    }
}