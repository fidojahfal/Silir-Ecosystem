<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\event;
use App\Models\event_area;
use Illuminate\Http\Request;

class areaAPIController extends Controller
{
    public function index(){
        $areas = area::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Area',
            'data' => $areas
        ]);
    }

    public function store(Request $request){
        $area = new area;
        $area->nama_area = $request->nama_area;
        $area->luas_area = $request->luas_area;
        $area->slot_stand = $request->slot_stand;
        $area->harga_sewa = $request->harga_sewa;
        $area->harga_buka_stand = $request->harga_buka_stand;
        $area->status_area = $request->status_area;
        $area->save();
        return response()->json([
            "message" => "area Ditambahkan."
        ], 201);
    }

    public function show($id_area){
        $area = area::find($id_area);
        if(!empty($area)){
            return response()->json([
                'success' => true,
                'message' => 'Detail area dengan ID = '.$id_area,
                'data' => $area
            ]);
        }
        else{
            return response()->json([
                "message" => "area tidak ditemukan."
            ], 404);
        }
    }

    public function update(Request $request, $id_area){
        if(area::where('id_area', $id_area)->exists()){
            $area = area::find($id_area);
            $area->nama_area = is_null($request->nama_area) ? $area->nama_area : $request->nama_area;
            $area->luas_area = is_null($request->luas_area) ? $area->luas_area : $request->luas_area;
            $area->slot_stand = is_null($request->slot_stand) ? $area->slot_stand : $request->slot_stand;
            $area->harga_sewa = is_null($request->harga_sewa) ? $area->harga_sewa : $request->harga_sewa;
            $area->harga_buka_stand = is_null($request->harga_buka_stand) ? $area->harga_buka_stand : $request->harga_buka_stand;
            $area->status_area = is_null($request->status_area) ? $area->status_area : $request->status_area;
            $area->save();
            return response()->json([
                "message" => "area Diperbaharui."
            ], 201);
        }
        else{
            return response()->json([
                "message" => "area tidak ditemukan."
            ], 404);
        }
    }

    public function destroy($id_area){
        if(area::where('id_area', $id_area)->exists()){
            $area = area::find($id_area);
            $area->delete();

            return response()->json([
                "message" => "area dihapus."
            ], 202);
        }
        else{
            return response()->json([
                "message" => "area tidak ditemukan."
            ], 404);
        }
    }

    public function showAvailableAreas($inputDate)
    {
        // Query untuk mendapatkan event yang memenuhi kriteria tanggal
        $events = event::where('status_event', 1)
                        ->whereDate('waktu_start', '<=', $inputDate)
                        ->whereDate('waktu_end', '>=', $inputDate)
                        ->get();

        // Dapatkan id_event dari setiap event yang ditemukan
        $eventIds = $events->pluck('id_event');

        // Query untuk mendapatkan id_area dari tabel event_area
        $usedAreaIds = event_area::whereIn('id_event', $eventIds)
                          ->pluck('id_area')
                          ->toArray();

        // Query untuk mendapatkan semua data area kecuali yang sudah digunakan
        $availableAreas = area::whereNotIn('id_area', $usedAreaIds)->get();
        
        return response()->json([
            'success' => true,
            'message' => 'List Area Tersedia',
            'data' => $availableAreas
        ]);
    }
}
