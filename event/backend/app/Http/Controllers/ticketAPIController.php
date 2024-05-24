<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ticketAPIController extends Controller
{
    public function index()
    {
        $tickets = ticket::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Ticket',
            'data' => $tickets
        ]);
    }

    public function store(Request $request)
    {
        $ticket = new ticket;
        $ticket->email = $request->email;
        $ticket->nama = $request->nama;
        $ticket->id_event = $request->id_event;
        $ticket->jumlah_tiket = $request->jumlah_tiket;
        $ticket->status = $request->status;

        // Proses dan simpan foto menggunakan Intervention Image
        if ($request->hasFile('bukti_pembayaran')) {
            $photo = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = public_path('storage/bukti_pembayaran/' . $filename);
            Image::make($photo)->save($path);
            $ticket->bukti_pembayaran = $filename;
        }
        $ticket->save();
        return response()->json([
            "message" => "Ticket Ditambahkan."
        ], 201);
    }

    public function show($id)
    {
        $ticket = ticket::find($id);
        if (!empty($ticket)) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Ticket dengan ID = '.$id,
                'data' => $ticket
            ]);
        } else {
            return response()->json([
                "message" => "Ticket tidak ditemukan."
            ], 404);
        }
    }

    public function showbyEmail($email)
    {
        if (ticket::where('email', $email)->exists()) {
            $ticket = ticket::where('email', $email)->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'message' => 'Ticket dengan email '.$email,
                'data' => $ticket
            ]);
        } else {
            return response()->json([
                "message" => "Ticket tidak ditemukan."
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (ticket::where('id', $id)->exists()) {
            $ticket = ticket::find($id);
            $ticket->email = is_null($request->email) ? $ticket->email : $request->email;
            $ticket->nama = is_null($request->nama) ? $ticket->nama : $request->nama;
            $ticket->id_event = is_null($request->id_event) ? $ticket->id_event : $request->id_event;
            $ticket->jumlah_tiket = is_null($request->jumlah_tiket) ? $ticket->jumlah_tiket : $request->jumlah_tiket;
            $ticket->status = is_null($request->status) ? $ticket->status : $request->status;
            // Proses dan simpan foto menggunakan Intervention Image
            if ($request->hasFile('bukti_pembayaran')) {
                $photo = $request->file('bukti_pembayaran');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = public_path('storage/bukti_pembayaran/' . $filename);
                Image::make($photo)->save($path);
    
                // Hapus file foto lama jika ada
                if ($ticket->bukti_pembayaran) {
                    $oldImagePath = public_path('storage/bukti_pembayaran/' . $ticket->bukti_pembayaran);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
    
                $ticket->bukti_pembayaran = $filename;
            }
            $ticket->save();
            return response()->json([
                "message" => "Ticket Diperbaharui."
            ], 200);
        } else {
            return response()->json([
                "message" => "Ticket tidak ditemukan."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if (ticket::where('id', $id)->exists()) {
            $ticket = ticket::find($id);
            $ticket->delete();

            return response()->json([
                "message" => "Ticket dihapus."
            ], 202);
        } else {
            return response()->json([
                "message" => "Ticket tidak ditemukan."
            ], 404);
        }
    }
}
