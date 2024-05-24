<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class eventAPIController extends Controller
{
    public function index()
    {
        $events = event::where('status_event', 1)->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Event',
            'data' => $events
        ]);
    }

    public function store(Request $request)
    {
        $event = new event;
        $event->nama_event = $request->nama_event;
        $event->penyelenggara = $request->penyelenggara;
        $event->deskripsi_event = $request->deskripsi_event;
        $event->biaya_masuk = $request->biaya_masuk;
        $event->waktu_start = $request->waktu_start;
        $event->waktu_end = $request->waktu_end;

        // Proses dan simpan foto menggunakan Intervention Image
        if ($request->hasFile('banner_event')) {
            $photo = $request->file('banner_event');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = public_path('storage/banner_event/' . $filename);
            Image::make($photo)->save($path);
            $event->banner_event = $filename;
        }
        $event->status_event = $request->status_event;
        $event->email = $request->email;
        $event->save();
        return response()->json([
            "message" => "Event Ditambahkan."
        ], 201);
    }

    public function show($id_event)
    {
        $event = event::find($id_event);
        if (!empty($event)) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Event dengan ID = '.$id_event,
                'data' => $event
            ]);
        } else {
            return response()->json([
                "message" => "Event tidak ditemukan."
            ], 404);
        }
    }

    public function showbyEmail($email)
    {
        if (event::where('email', $email)->exists()) {
            $event = event::where('email', $email)->orderBy('id_event', 'desc')->get();
            return response()->json([
                'success' => true,
                'message' => 'Event dengan email '.$email,
                'data' => $event
            ]);
        } else {
            return response()->json([
                "message" => "Event tidak ditemukan."
            ], 404);
        }
    }

    public function update(Request $request, $id_event)
    {
        if (event::where('id_event', $id_event)->exists()) {
            $event = event::find($id_event);
            $event->nama_event = is_null($request->nama_event) ? $event->nama_event : $request->nama_event;
            $event->penyelenggara = is_null($request->penyelenggara) ? $event->penyelenggara : $request->penyelenggara;
            $event->deskripsi_event = is_null($request->deskripsi_event) ? $event->deskripsi_event : $request->deskripsi_event;
            $event->biaya_masuk = is_null($request->biaya_masuk) ? $event->biaya_masuk : $request->biaya_masuk;
            $event->waktu_start = is_null($request->waktu_start) ? $event->waktu_start : $request->waktu_start;
            $event->waktu_end = is_null($request->waktu_end) ? $event->waktu_end : $request->waktu_end;
            // Proses dan simpan foto menggunakan Intervention Image
            if ($request->hasFile('banner_event')) {
                $photo = $request->file('banner_event');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = public_path('storage/banner_event/' . $filename);
                Image::make($photo)->save($path);
    
                // Hapus file foto lama jika ada
                if ($event->banner_event) {
                    $oldImagePath = public_path('storage/banner_event/' . $event->banner_event);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
    
                $event->banner_event = $filename;
            }
            $event->status_event = is_null($request->status_event) ? $event->status_event : $request->status_event;
            $event->email = is_null($request->email) ? $event->email : $request->email;
            $event->save();
            return response()->json([
                "message" => "Event Diperbaharui."
            ], 200);
        } else {
            return response()->json([
                "message" => "Event tidak ditemukan."
            ], 404);
        }
    }

    public function destroy($id_event)
    {
        if (event::where('id_event', $id_event)->exists()) {
            $event = event::find($id_event);
            $event->delete();

            return response()->json([
                "message" => "Event dihapus."
            ], 202);
        } else {
            return response()->json([
                "message" => "Event tidak ditemukan."
            ], 404);
        }
    }

    public function checkAvailability($waktu_start, $waktu_end)
    {
        // Query untuk memeriksa apakah ada data waktu_start di antara jangka waktu_start dan waktu_end di database
        $conflictingEvent = event::whereDate('waktu_start', '>=', $waktu_start)
                                ->whereDate('waktu_start', '<=', $waktu_end)
                                ->first();

        return response()->json([
            'success' => true,
            'message' => 'Event yang confict',
            'data' => $conflictingEvent
        ]);
    }

    public function upcoming()
    {
        $today = Carbon::today();
        $events = event::whereDate('waktu_start', '>=', $today)->where('status_event', 1)->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Event',
            'data' => $events
        ]);
    }

    public function all()
    {
        $events = event::orderBy('id_event', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Event',
            'data' => $events
        ]);
    }
}
