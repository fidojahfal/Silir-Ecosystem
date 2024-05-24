<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TiketController extends Controller
{
    public function beli($id){
        $response = Http::get('http://localhost:8000/api/eo/events/'.$id);
        $event_data = $response->json();
        return view('ticket', compact('event_data'));
    }

    public function checkout(Request $request){
        $data = [
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'id_event' => $request->input('id_event'),
            'jumlah_tiket' => $request->input('jumlah_tiket'),
            'status' => 0,
        ];
    
        // Mengambil file foto dari request
        $photo = $request->file('bukti_pembayaran');
    
        // Memeriksa apakah ada file foto yang diunggah
        if ($photo) {
            // Menyimpan file foto ke tempat sementara
            $photoPath = $photo->store('temp');
    
            $client = new Client();
    
            $response = $client->request('POST', 'http://localhost:8000/api/eo/ticket', [
                'multipart' => [
                    [
                        'name' => 'email',
                        'contents' => $data['email']
                    ],
                    [
                        'name' => 'nama',
                        'contents' => $data['nama']
                    ],
                    [
                        'name' => 'id_event',
                        'contents' => $data['id_event']
                    ],
                    [
                        'name' => 'jumlah_tiket',
                        'contents' => $data['jumlah_tiket']
                    ],
                    [
                        'name' => 'bukti_pembayaran',
                        'contents' => fopen(storage_path('app/' . $photoPath), 'r')
                    ],
                    [
                        'name' => 'status',
                        'contents' => $data['status']
                    ],
                ],
            ]);
    
            // Menghapus file foto dari tempat sementara
            Storage::delete($photoPath);
        } else {
            // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa bukti_pembayaran
            $response = Http::post('http://localhost:8000/api/eo/ticket', $data);
        }

        $email = $request->input('email');
        $response = Http::get('http://localhost:8000/api/eo/ticket/user/'.$email);
        $tiket_user = $response->json();
        return redirect()->route('tiket.user')->with( ['tiket_user' => $tiket_user] );
    }

    public function tiketUser(Request $request){
        $email = $request->input('email');
        $response = Http::get('http://localhost:8000/api/eo/ticket/user/'.$email);
        $tiket_user = $response->json();
        return redirect()->route('tiket.user')->with( ['tiket_user' => $tiket_user] );
    }
}
