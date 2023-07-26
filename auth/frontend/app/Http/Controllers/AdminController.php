<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return redirect('/');
    }

    public function hotel() {
        return redirect()->away("http://192.168.246.115:8000/admin/home?access_token=" . session('access_token'));
    }

    public function event() {
        return redirect()->away("http://192.168.246.117:8008/?access_token=" . session('access_token'));
    }

    public function parkir() {
        return redirect()->away("http://192.168.246.182:8080/?access_token=" . session('access_token'));
    }
}
