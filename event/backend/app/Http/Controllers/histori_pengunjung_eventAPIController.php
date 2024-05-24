<?php

namespace App\Http\Controllers;

use App\Models\histori_pengunjung_event;
use Illuminate\Http\Request;

class histori_pengunjung_eventAPIController extends Controller
{
    public function index(){
        $historis = histori_pengunjung_event::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Histori Pengunjung',
            'data' => $historis
        ]);
    }

    public function store(Request $request){
        $histori = new histori_pengunjung_event();
        $histori->tiket_pengunjung = $request->tiket_pengunjung;
        $histori->id_event = $request->id_event;
        $histori->save();
        return response()->json([
            "message" => "Histori Ditambahkan."
        ], 201);
    }

    public function show($id_event){
        $histori = histori_pengunjung_event::find($id_event);
        if(!empty($histori)){
            return response()->json([
                'success' => true,
                'message' => 'Detail Histori Event dengan ID = '.$id_event,
                'data' => $id_event
            ]);
        }
        else{
            return response()->json([
                "message" => "Histori tidak ditemukan."
            ], 404);
        }
    }

    public function update(Request $request, $id_event){
        if(histori_pengunjung_event::where('id_event', $id_event)->exists()){
            $histori = histori_pengunjung_event::find($id_event);
            $histori->tiket_pengunjung = is_null($request->tiket_pengunjung) ? $histori->tiket_pengunjung : $request->tiket_pengunjung;
            $histori->id_event = is_null($request->id_event) ? $histori->id_event : $request->id_event;
            $histori->save();
            return response()->json([
                "message" => "Histori Diperbaharui."
            ], 201);
        }
        else{
            return response()->json([
                "message" => "Histori tidak ditemukan."
            ], 404);
        }
    }

    public function destroy($id_event){
        if(histori_pengunjung_event::where('id_event', $id_event)->exists()){
            $histori = histori_pengunjung_event::find($id_event);
            $histori->delete();

            return response()->json([
                "message" => "Histori dihapus."
            ], 202);
        }
        else{
            return response()->json([
                "message" => "Histori tidak ditemukan."
            ], 404);
        }
    }
}
