<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        return view('pages.main');
    }

    public function pariwisata() {
        return redirect()->away("http://localhost:3000/index.php?access_token=" . session('access_token'));
    }

    public function event() {
        return redirect()->away("http://192.168.246.117:8008/upcoming_event?access_token=" . session('access_token'));
    }

    public function hotel() {
        return redirect()->away("http://192.168.246.115:8000/admin/home?access_token=" . session('access_token'));
    }
}
