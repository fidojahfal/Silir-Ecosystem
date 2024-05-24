<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/eo/events');
        $jsonData = $response->json();
        $dataEvent = json_decode(json_encode($jsonData), true);
        $response = Http::get('http://localhost:8000/api/eo/stands');
        $jsonData = $response->json();
        $dataStand = json_decode(json_encode($jsonData), true);
        $response = Http::get('http://localhost:8000/api/eo/areas');
        $jsonData = $response->json();
        $dataArea = json_decode(json_encode($jsonData), true);
        return view('index', compact('dataEvent', 'dataStand', 'dataArea'));
    }

    public function gallery(){
        return view('gallery');
    }

    public function contact(){
        return view('contact');
    }
}
