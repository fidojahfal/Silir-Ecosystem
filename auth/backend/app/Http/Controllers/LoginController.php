<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Http;

// class LoginController extends Controller
// {
//     public function show()
//     {
//         return view('auth.login');
//     }

//     public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required'],
//         ]);

//         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//             $response = Http::post('http://localhost:8080/api/auth/login', [
//                 'email' => $request->email,
//                 'password' => $request->password,
//             ]);
//             $request->session()->put('access_token', $response['access_token']);
//             $request->session()->regenerate();
//             return $request->session()->get('access_token');
//         }

//         return back()->withErrors([
//             'email' => 'The provided credentials do not match our records.',
//         ]);
//     }

//     public function logout(Request $request)
//     {
//         $response = Http::withHeaders([
//             'Authorization' => 'Bearer ' . $request->session()->get('access_token'),
//         ])->post('http://localhost:8080/api/auth/logout');
//         Auth::logout();
//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return redirect()->route('login');
//     }
// }
