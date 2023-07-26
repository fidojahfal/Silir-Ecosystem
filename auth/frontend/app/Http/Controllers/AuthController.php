<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    function login(Request $request) {
        return view('auth.login');
    }

    function performLogin(Request $request) {
        $response = Http::post('http://192.168.0.112:7777/api/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session(['access_token' => $response['access_token']]);
        session(['role' => $response['user']['role']]);

        if (session('role') == 'admin') {
            return redirect()->route('admin');
        }
        return redirect()->route('main');
    }

    function register() {
        return view('auth.register');
    }

    function performRegister(Request $request) {
        $response = Http::post('http://192.168.0.112:7777/api/auth/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password,
        ]);
        $email = $request->email;
        return redirect()->route('login')->with(['email' => $email]);
    }

    function logout(Request $request) {
        $response = Http::withHeaders([
            'Authorization' => 'bearer ' . session('access_token'),
        ])->post('http://192.168.0.112:7777/api/auth/logout');
        return redirect()->route('login');
    }
}
