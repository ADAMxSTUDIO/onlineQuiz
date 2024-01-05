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
            return redirect()->intended(route('quiz.sheet'));
        } else {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput($request->only('email'));
        }
    }

    /**
     * Logout process.
     */
    public function Logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->intended('/')->with(['submitted' => 'Your quiz is submitted successfully, bravo!']);
    }
}
