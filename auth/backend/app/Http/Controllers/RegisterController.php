<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

// use App\Models\User;

// class RegisterController extends Controller
// {
//     public function create()
//     {
//         return view('auth.register');
//     }

//     public function store(Request $request)
//     {
//         $attributes = $request->validate([
//             'username' => 'required|max:255|min:2',
//             'email' => 'required|email|max:255|unique:users,email',
//             'password' => 'required|min:5|max:255'
//         ]);
//         $response = Http::post('http://localhost:8000/api/auth/register', [
//             'name' => $request->username,
//             'email' => $request->email,
//             'password' => $request->password,
//             'password_confirmation' => $request->password,
//         ]);
//         $user = User::create($attributes);
//         auth()->login($user);

//         return redirect()->route('main');
//     }
// }
