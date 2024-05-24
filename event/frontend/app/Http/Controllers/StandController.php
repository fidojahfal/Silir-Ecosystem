<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class StandController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/eo/stands');
        $jsonData = $response->json();
        $dataStand = json_decode(json_encode($jsonData), true);
        return view('stand', compact('dataStand'));
    }

    public function create()
    {
        return view('stand.register_stand');
    }

    public function store(Request $request)
    {
        // Proses data checkbox dan kirim ke API event_area jika checkbox dipilih
        $checkboxes = $request->input('id_area');
        foreach ($checkboxes as $id_area) {
            $data = [
                'nama_stand' => $request->input('nama_stand'),
                'deskripsi_stand' => $request->input('deskripsi_stand'),
                'id_area' => $id_area,
                'status_stand' => 0,
                'email' => $request->input('email'),
            ];
    
            // Mengambil file foto dari request
            $photo = $request->file('foto_stand');
    
            // Memeriksa apakah ada file foto yang diunggah
            if ($photo) {
                // Menyimpan file foto ke tempat sementara
                $photoPath = $photo->store('temp');
    
                $client = new Client();
    
                $response = $client->request('POST', 'http://localhost:8000/api/eo/stands', [
                    'multipart' => [
                        [
                            'name' => 'nama_stand',
                            'contents' => $data['nama_stand']
                        ],
                        [
                            'name' => 'deskripsi_stand',
                            'contents' => $data['deskripsi_stand']
                        ],
                        [
                            'name' => 'id_area',
                            'contents' => $data['id_area']
                        ],
                        [
                            'name' => 'foto_stand',
                            'contents' => fopen(storage_path('app/' . $photoPath), 'r')
                        ],
                        [
                            'name' => 'status_stand',
                            'contents' => $data['status_stand']
                        ],
                        [
                            'name' => 'email',
                            'contents' => $data['email']
                        ],
                    ],
                ]);
                // Menghapus file foto dari tempat sementara
                Storage::delete($photoPath);
            } else {
                // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa foto_stand
                $response = Http::post('http://localhost:8000/api/eo/stands', $data);
            }
        }
        $response = Http::get('http://localhost:8000/api/eo/stands/user/'.$request->input('email'));
        $stand_user = $response->json();
        $response = Http::get('http://localhost:8000/api/eo/areas/');
        $data_area = $response->json();
        return redirect()->route('stand.user')->with( ['stand_user' => $stand_user,'data_area' => $data_area] );
    }

    public function myStand(Request $request){
        $email = $request->input('email');
        $response = Http::get('http://localhost:8000/api/eo/stands/user/'.$email);
        $stand_user = $response->json();
        $response = Http::get('http://localhost:8000/api/eo/areas/');
        $data_area = $response->json();
        return redirect()->route('stand.user')->with( ['stand_user' => $stand_user,'data_area' => $data_area] );
    }

    public function billingStand($id){
        $response = Http::get('http://localhost:8000/api/eo/stands/'.$id);
        $stand_data = $response->json();
        $stand = $stand_data['data'];
        $response = Http::get('http://localhost:8000/api/eo/areas/'.$stand['id_area']);
        $area_data = $response->json();
        $area = $area_data['data'];
        return view('stand.billing_stand', compact('stand', 'area'));
    }

    public function myStand_updateStatus(Request $request,$id){
        $data = [
            'status_stand' => 1,
        ];
        Http::put('http://localhost:8000/api/eo/stands/'.$id, $data);
        $email = $request->input('email');
        $response = Http::get('http://localhost:8000/api/eo/stands/user/'.$email);
        $stand_user = $response->json();
        $response = Http::get('http://localhost:8000/api/eo/areas/');
        $data_area = $response->json();
        return redirect()->route('stand.user')->with( ['stand_user' => $stand_user,'data_area' => $data_area] );
    }

    public function editStand($id){
        $response = Http::get('http://localhost:8000/api/eo/stands/'.$id);
        $stand_data = $response->json();
        $stand = $stand_data['data'];
        $response = Http::get('http://localhost:8000/api/eo/areas/'.$stand['id_area']);
        $area_data = $response->json();
        $area_stand = $area_data['data'];
        $response = Http::get('http://localhost:8000/api/eo/areas/');
        $semua_area = $response->json();
        $semua_area = $semua_area['data'];
        return view('stand.edit_stand', compact('stand', 'area_stand', 'semua_area'));
    }

    public function updateStand(Request $request, $id){
        $data = [
            'nama_stand' => $request->input('nama_stand'),
            'deskripsi_stand' => $request->input('deskripsi_stand'),
            'id_area' => $request->input('id_area'),
        ];

        // Mengambil file foto dari request
        $photo = $request->file('foto_stand');

        // Memeriksa apakah ada file foto yang diunggah
        if ($photo) {
            // Menyimpan file foto ke tempat sementara
            $photoPath = $photo->store('temp');

            $client = new Client();

            $response = $client->put('http://localhost:8000/api/eo/stands/'.$id, [
                'multipart' => [
                    [
                        'name' => 'nama_stand',
                        'contents' => $data['nama_stand']
                    ],
                    [
                        'name' => 'deskripsi_stand',
                        'contents' => $data['deskripsi_stand']
                    ],
                    [
                        'name' => 'id_area',
                        'contents' => $data['id_area']
                    ],
                    [
                        'name' => 'foto_stand',
                        'contents' => fopen(storage_path('app/' . $photoPath), 'r')
                    ],
                ],
            ]);
            // Menghapus file foto dari tempat sementara
            Storage::delete($photoPath);
        } else {
            // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa foto_stand
            $response = Http::put('http://localhost:8000/api/eo/stands/'.$id, $data);
        }

        $email = $request->input('email');
        $response = Http::get('http://localhost:8000/api/eo/stands/user/'.$email);
        $stand_user = $response->json();
        $response = Http::get('http://localhost:8000/api/eo/areas/');
        $data_area = $response->json();
        return redirect()->route('stand.user')->with( ['stand_user' => $stand_user,'data_area' => $data_area] );
    }
}
