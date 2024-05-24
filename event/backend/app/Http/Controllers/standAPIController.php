<?php

namespace App\Http\Controllers;

use App\Models\stand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class standAPIController extends Controller
{
    public function index(){
        $stands = stand::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Stand',
            'data' => $stands
        ]);
    }

    public function store(Request $request){
        $stand = new stand;
        $stand->nama_stand = $request->nama_stand;
        $stand->deskripsi_stand = $request->deskripsi_stand;
        $stand->id_area = $request->id_area;
        if ($request->hasFile('foto_stand')) {
            $photo = $request->file('foto_stand');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = public_path('storage/foto_stand/' . $filename);
            Image::make($photo)->save($path);
            $stand->foto_stand = $filename;
        }
        
        $stand->status_stand = $request->status_stand;
        $stand->email = $request->email;
        $stand->save();
        return response()->json([
            "message" => "stand Ditambahkan."
        ], 201);
    }

    public function show($id_stand){
        $stand = stand::find($id_stand);
        if(!empty($stand)){
            return response()->json([
                'success' => true,
                'message' => 'Detail Stand dengan ID = '.$id_stand,
                'data' => $stand
            ]);
        }
        else{
            return response()->json([
                "message" => "stand tidak ditemukan."
            ], 404);
        }
    }

    public function showbyEmail($email)
    {
        if (stand::where('email', $email)->exists()) {
            $stand = stand::where('email', $email)->orderBy('id_stand', 'desc')->get();
            return response()->json([
                'success' => true,
                'message' => 'stand dengan email '.$email,
                'data' => $stand
            ]);
        } else {
            return response()->json([
                "message" => "stand tidak ditemukan."
            ], 404);
        }
    }

    public function update(Request $request, $id_stand){
        if(stand::where('id_stand', $id_stand)->exists()){
            $stand = stand::find($id_stand);
            $stand->nama_stand = is_null($request->nama_stand) ? $stand->nama_stand : $request->nama_stand;
            $stand->deskripsi_stand = is_null($request->deskripsi_stand) ? $stand->deskripsi_stand : $request->deskripsi_stand;
            $stand->id_area = is_null($request->id_area) ? $stand->id_area : $request->id_area;
            if ($request->hasFile('foto_stand')) {
                $photo = $request->file('foto_stand');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = public_path('storage/foto_stand/' . $filename);
                Image::make($photo)->save($path);
    
                // Hapus file foto lama jika ada
                if ($stand->foto_stand) {
                    $oldImagePath = public_path('storage/foto_stand/' . $stand->foto_stand);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
    
                $stand->foto_stand = $filename;
            }
            $stand->status_stand = is_null($request->status_stand) ? $stand->status_stand : $request->status_stand;
            $stand->email = is_null($request->email) ? $stand->email : $request->email;
            $stand->save();
            return response()->json([
                "message" => "stand Diperbaharui."
            ], 201);
        }
        else{
            return response()->json([
                "message" => "stand tidak ditemukan."
            ], 404);
        }
    }

    public function destroy($id_stand){
        if(stand::where('id_stand', $id_stand)->exists()){
            $stand = stand::find($id_stand);
            $stand->delete();

            return response()->json([
                "message" => "stand dihapus."
            ], 202);
        }
        else{
            return response()->json([
                "message" => "stand tidak ditemukan."
            ], 404);
        }
    }
}
