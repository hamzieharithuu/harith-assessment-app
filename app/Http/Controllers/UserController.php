<?php

namespace App\Http\Controllers;

use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // ToastMagic::success("Success!", "Your data has been saved!");
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => '*Email is required.',
            'email.email' => '*This is not a valid email.',
            'password.required' => '*Password is required'
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect()->intended('index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('toast', [
            'status' => 'success',
            'title' => 'Log Out Success',
            'message' => "You've been logged out successfully"
        ]);

        return redirect('/login');
    }
}
