<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('Login.login');
    }
    public function loginuser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials))
        {
            return redirect()->route('books.index')->with('success','You successfully login in');
        }
        return back()->with('error', 'Login yoki parol noto‘g‘ri!');
    }
    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
