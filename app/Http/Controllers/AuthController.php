<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function forgotPasswordForm() {
        return view('auth.forgot-password');
    }

    // ---------------------- LOGIN ----------------------
    public function login(Request $request)
    {
        $request->validate([
            'EmailId' => 'required|email',
            'Password' => 'required'
        ]);

        $user = User::where('EmailId', $request->EmailId)->first();

        if ($user && Hash::check($request->Password, $user->Password)) {
            Auth::login($user, true);
            $request->session()->regenerate();

            // Always return JSON for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'user_name' => $user->FullName,
                    'message' => 'Login successful'
                ]);
            }

            return redirect()->intended(route('home'))->with('success', 'Welcome back, ' . $user->FullName . '!');
        }

        // For failed login
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
                'errors' => ['EmailId' => 'Invalid email or password.']
            ], 422);
        }

        return back()->withErrors(['EmailId' => 'Invalid email or password.']);
    }

    // ---------------------- REGISTER ----------------------
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'FullName' => 'required|string|max:120',
            'EmailId' => 'required|email|unique:tblusers,EmailId',
            'Password' => 'required|min:6|confirmed',
            'terms_agreement' => 'required'
        ]);

        if ($validator->fails()) {
            // For AJAX requests, return JSON response
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            return back()->withErrors($validator)->withInput();
        }

        // Create user
        $user = User::create([
            'FullName' => $request->FullName,
            'EmailId' => $request->EmailId,
            'Password' => Hash::make($request->Password),
            'RegDate' => now(),
        ]);

        // For AJAX requests, return JSON response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful!'
            ]);
        }

        return redirect()->route('home')->with('info', 'Registration successful! Please log in to continue.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}