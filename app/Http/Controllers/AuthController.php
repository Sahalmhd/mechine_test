<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin; // Import Admin model
use App\Models\User; // Import User model

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Create this view
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get user input
        $input = $request->only('email', 'password');
        $rememberMe = $request->has('remember_me'); // Check if 'remember_me' checkbox is checked

        // Check if the email belongs to an admin
        if (Admin::where('email', $input['email'])->exists()) {
            // Attempt to log in using the admin guard
            if (Auth::guard('admin')->attempt($input, $rememberMe)) {
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            }
        }
        // Check if the email belongs to a regular user
        elseif (User::where('email', $input['email'])->exists()) {
            // Attempt to log in using the default user guard
            if (Auth::attempt($input, $rememberMe)) {
                return redirect()->route('home'); // Redirect to user home
            }
        }

        // If login fails, return a failure message
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
