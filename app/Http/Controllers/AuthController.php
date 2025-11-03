<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function formLogin() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
    }

     public function logout(Request $request)
    {
     
        Auth::logout();

       
        $request->session()->invalidate();

        
        $request->session()->regenerateToken();

        
        return redirect()->route('login');
    }
}
