<?php

namespace App\Http\Controllers;

use App\Models\event_area;
use Illuminate\Http\Request;

class event_areaAPIController extends Controller
{
    public function index(){
        $event_areas = event_area::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Event Area',
            'data' => $event_areas
        ]);
    }

    public function store(Request $request){
        $event_area = new event_area;
        $event_area->id_event = $request->id_event;
        $event_area->id_area = $request->id_area;
        $event_area->keterangan = $request->keterangan;
        $event_area->save();
        return response()->json([
            "message" => "Data Event Area Ditambahkan."
        ], 201);
    }

    public function show($id_event){
        $event_area = event_area::where('id_event', $id_event)->exists();
        if(!empty($event_area)){
            $event_area = event_area::where('id_event', $id_event)->get();
            return response()->json([
                'success' => true,
                'message' => 'Detail Area yang digunakan event dengan ID = '.$id_event,
                'data' => $event_area
            ]);
        }
        else{
            return response()->json([
                "message" => "Data tidak ditemukan."
            ], 404);
        }
    }

    public function update(Request $request, $id_event, $id_area=null){
        if($id_area == null){
            if(event_area::where('id_event', $id_event)->exists()){
                $event_area = event_area::where('id_event', $id_event)->get();
                $id = $event_area[0]->id;
                $event_area2 = event_area::find($id);
                // $event_area->id_event = is_null($request->id_event) ? $event_area->id_event : $request->id_event;
                $event_area2->id_area = is_null($request->id_area) ? $event_area2->id_area : $request->id_area;
                $event_area2->keterangan = is_null($request->keterangan) ? $event_area2->keterangan : $request->keterangan;
                $event_area2->save();
                return response()->json([
                    "message" => "Data Event Area Diperbaharui."
                ], 201);
            }
            else{
                return response()->json([
                    "message" => "Data tidak ditemukan."
                ], 404);
            }
        }
        else{
            if(event_area::where('id_event', $id_event)->exists()){
                $event_area = event_area::where([
                    'id_event' => $id_event,
                    'id_area'=> $id_area
                ])->get();
                $id = $event_area[0]->id;
                $event_area2 = event_area::find($id);
                // $event_area->id_event = is_null($request->id_event) ? $event_area->id_event : $request->id_event;
                // $event_area2->id_area = is_null($request->id_area) ? $event_area2->id_area : $request->id_area;
                $event_area2->keterangan = is_null($request->keterangan) ? $event_area2->keterangan : $request->keterangan;
                $event_area2->save();
                return response()->json([
                    "message" => "Data Event Area Diperbaharui."
                ], 201);
            }
            else{
                return response()->json([
                    "message" => "Data tidak ditemukan."
                ], 404);
            }
        }
    }

    public function destroy($id_event, $id_area){
        $event_area = event_area::where([
            'id_event' => $id_event,
            'id_area'=> $id_area
        ])->exists();
        if(!empty($event_area)){
            $event_area = event_area::where([
                'id_event' => $id_event,
                'id_area'=> $id_area
            ])->get();
            $id = $event_area[0]->id;
            $event_area2 = event_area::find($id);
            $event_area2->delete();

            return response()->json([
                "message" => "Data Event Area dihapus."
            ], 202);
        }
        else{
            return response()->json([
                "message" => "Data tidak ditemukan."
            ], 404);
        }
    }
    // public function show($id_event, $id_area){
    //     $event_area = event_area::where([
    //         'id_event' => $id_event,
    //         'id_area'=> $id_area
    //     ])->exists();
    //     if(!empty($event_area)){
    //         if($id_area == null){
    //             $event_area = event_area::where('id_event', $id_event)->get();
    //         }
    //         else{
    //             $event_area = event_area::where([
    //                 'id_event' => $id_event,
    //                 'id_area'=> $id_area
    //             ])->get();
    //         }
    //         return response()->json($event_area);
    //     }
    //     else{
    //         return response()->json([
    //             "message" => "Data tidak ditemukan."
    //         ], 404);
    //     }
    // }
}
