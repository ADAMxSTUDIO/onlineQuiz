<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Show the form for login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Login process.
     */
    public function Login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                // Redirect admin to admin dashboard
                return redirect()->intended(route('admin.index'));
            } else {
                // Redirect regular user to user dashboard or specific route
                return redirect()->intended(route('quiz.sheet'));
            }
        } else {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput($request->only('email'));
        }
    }

    /**
     * Logout process.
     */
    public function Logout()
    {
        // To prevent admin from logging out and losing access to is_admin field
        $id_admin = Auth::user()->is_admin;
        Session::flush();
        Auth::logout();

        if ($id_admin) {
            return redirect()->intended('/')->with(['submitted' => 'Logged out successfully!']);
        } else {
            return redirect()->intended('/')->with(['submitted' => 'Your quiz is submitted successfully, BRAVO!']);
        }
    }
}
