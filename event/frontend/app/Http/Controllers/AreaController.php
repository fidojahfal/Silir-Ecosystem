<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/eo/areas');
        $jsonData = $response->json();
        $dataArea = json_decode(json_encode($jsonData), true);
        return view('area', compact('dataArea'));
    }
}
