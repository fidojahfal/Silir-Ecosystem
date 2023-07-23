<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    function login(Request $request) {
        return view('auth.login-bs');
    }

    function performLogin(Request $request) {
        $response = Http::post(env('SG_AUTH') . '/api/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session(['access_token' => $response['access_token']]);

        return redirect()->route('main');
    }

    function register() {
        return view('auth.register-bs');
    }

    function performRegister(Request $request) {
        
    }
}
