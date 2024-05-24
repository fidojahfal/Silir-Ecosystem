<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        if(session('role') != "admin"){
            return redirect('/');
        }
    }
    public function event(){
        $response = Http::get('http://localhost:8000/api/eo/all_events');
        $event_data = $response->json();
        return view('dashboard.event', compact('event_data'));
    }

    public function stand(){
        $response = Http::get('http://localhost:8000/api/eo/stands');
        $stand_data = $response->json();
        return view('dashboard.stand', compact('stand_data'));
    }

    public function area(){
        $response = Http::get('http://localhost:8000/api/eo/areas');
        $area_data = $response->json();
        return view('dashboard.area', compact('area_data'));
    }
    public function histori(){
        $response = Http::get('http://localhost:8000/api/eo/histori');
        $histori_data = $response->json();

        $response = Http::get('http://localhost:8000/api/eo/events');
        $event_data = $response->json();
        return view('dashboard.histori_pengunjung', compact('histori_data', 'event_data'));
    }

    public function historiStore(Request $request){
        $data = [
            'tiket_pengunjung' => $request->input('tiket_pengunjung'),
            'id_event' => $request->input('id_event'),
        ];
        Http::post('http://localhost:8000/api/eo/histori', $data);

        return redirect('/dashboard/histori');
    }

    public function ticket(){
        $response = Http::get('http://localhost:8000/api/eo/ticket');
        $tiket_data = $response->json();
        return view('dashboard.ticket', compact('tiket_data'));
    }

    public function confirmTicket($id){
        $data = [
            'status' => 1,
        ];
        Http::put('http://localhost:8000/api/eo/ticket/'.$id, $data);
        return redirect('/dashboard/ticket');
    }
}
