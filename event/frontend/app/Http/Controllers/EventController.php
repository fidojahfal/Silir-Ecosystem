<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/eo/events');
        if ($response->successful()) {
            $jsonData = $response->json();
            $data = json_decode(json_encode($jsonData), true);
            return view('event.index', compact('data'));
        } else {
            $errorCode = $response->status();
            $errorMessage = $response->body();
        }
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama_event' => $request->input('nama_event'),
            'penyelenggara' => $request->input('penyelenggara'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'biaya_masuk' => $request->input('biaya_masuk'),
            'waktu_start' => $request->input('waktu_start'),
            'waktu_end' => $request->input('waktu_end'),
            'status_event' => 0,
            'email' => $request->input('email'),
        ];

        // Mengambil file foto dari request
        $photo = $request->file('banner_event');

        // Memeriksa apakah ada file foto yang diunggah
        if ($photo) {
            // Menyimpan file foto ke tempat sementara
            $photoPath = $photo->store('temp');

            $client = new Client();

            $response = $client->request('POST', 'http://localhost:8000/api/eo/events', [
                'multipart' => [
                    [
                        'name' => 'nama_event',
                        'contents' => $data['nama_event']
                    ],
                    [
                        'name' => 'penyelenggara',
                        'contents' => $data['penyelenggara']
                    ],
                    [
                        'name' => 'deskripsi_event',
                        'contents' => $data['deskripsi_event']
                    ],
                    [
                        'name' => 'biaya_masuk',
                        'contents' => $data['biaya_masuk']
                    ],
                    [
                        'name' => 'waktu_start',
                        'contents' => $data['waktu_start']
                    ],
                    [
                        'name' => 'waktu_end',
                        'contents' => $data['waktu_end']
                    ],
                    [
                        'name' => 'banner_event',
                        'contents' => fopen(storage_path('app/' . $photoPath), 'r')
                    ],
                    [
                        'name' => 'status_event',
                        'contents' => $data['status_event']
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
            // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa banner_event
            $response = Http::post('http://localhost:8000/api/eo/events', $data);
        }
        if ($response->getStatusCode() === 201) {
            return redirect('eo/events');
        } else {
            $errorCode = $response->getStatusCode();
            $errorMessage = $response->getBody()->getContents();
        }
    }

    public function edit($id)
    {
        $response = Http::get('http://localhost:8000/api/eo/events/'.$id);
        if ($response->successful()) {
            $jsonData = $response->json();
            $data = json_decode(json_encode($jsonData), true);
            return view('event.edit', compact('data'));
        } else {
            $errorCode = $response->status();
            $errorMessage = $response->body();
        }
    }
    
    public function update(Request $request, $id)
    {
        $data = [
            'nama_event' => $request->input('nama_event'),
            'penyelenggara' => $request->input('penyelenggara'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'biaya_masuk' => $request->input('biaya_masuk'),
            'waktu_start' => $request->input('waktu_start'),
            'waktu_end' => $request->input('waktu_end'),
            'status_event' => $request->input('status_event'),
            'email' => $request->input('email')
        ];
    
        // Mengambil file foto dari request
        $photo = $request->file('banner_event');
    
        // Memeriksa apakah ada file foto yang diunggah
        if ($photo) {
            // Menyimpan file foto ke tempat sementara
            $photoPath = $photo->store('temp');
    
            $client = new Client();
    
            $response = $client->put('http://localhost:8000/api/eo/events/'.$id, [
                'multipart' => [
                    [
                        'name' => 'nama_event',
                        'contents' => $data['nama_event']
                    ],
                    [
                        'name' => 'penyelenggara',
                        'contents' => $data['penyelenggara']
                    ],
                    [
                        'name' => 'deskripsi_event',
                        'contents' => $data['deskripsi_event']
                    ],
                    [
                        'name' => 'biaya_masuk',
                        'contents' => $data['biaya_masuk']
                    ],
                    [
                        'name' => 'waktu_start',
                        'contents' => $data['waktu_start']
                    ],
                    [
                        'name' => 'waktu_end',
                        'contents' => $data['waktu_end']
                    ],
                    [
                        'name' => 'status_event',
                        'contents' => $data['status_event']
                    ],
                    [
                        'name' => 'banner_event',
                        'contents' => fopen(storage_path('app/' . $photoPath), 'r'),
                        // 'filename' => $photo->getClientOriginalName() // Menambahkan filename untuk foto
                    ],
                ],
            ]);
    
            // Menghapus file foto dari tempat sementara
            Storage::delete($photoPath);
        } else {
            // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa banner_event
            $response = Http::put('http://localhost:8000/api/eo/events/'.$id, $data);
        }
    
        if ($response->getStatusCode() === 200) {
            return redirect('eo/events');
        } else {
            $errorCode = $response->getStatusCode();
            $errorMessage = $response->getBody()->getContents();
        }
    }


    public function destroy(Request $request, $id)
    {
        $response = Http::delete('http://localhost:8000/api/eo/events/'.$id);

        if ($response->successful()) {
            return redirect('eo/events');
        } else {
            // Tangani jika permintaan tidak berhasil
            $errorCode = $response->status();
            $errorMessage = $response->body();
            // Tangani kesalahan sesuai kebutuhan
        }
    }

    public function booking()
    {
        return view('booking');
    }

    public function bookingStore(Request $request)
    {
        $data = [
            'nama_event' => $request->input('nama_event'),
            'penyelenggara' => $request->input('penyelenggara'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'biaya_masuk' => $request->input('biaya_masuk'),
            'waktu_start' => $request->input('waktu_start'),
            'waktu_end' => $request->input('waktu_end'),
            'status_event' => 0,
            'email' => $request->input('email'),
        ];
    
        // Mengambil file foto dari request
        $photo = $request->file('banner_event');
    
        // Memeriksa apakah ada file foto yang diunggah
        if ($photo) {
            // Menyimpan file foto ke tempat sementara
            $photoPath = $photo->store('temp');
    
            $client = new Client();
    
            $response = $client->request('POST', 'http://localhost:8000/api/eo/events', [
                'multipart' => [
                    [
                        'name' => 'nama_event',
                        'contents' => $data['nama_event']
                    ],
                    [
                        'name' => 'penyelenggara',
                        'contents' => $data['penyelenggara']
                    ],
                    [
                        'name' => 'deskripsi_event',
                        'contents' => $data['deskripsi_event']
                    ],
                    [
                        'name' => 'biaya_masuk',
                        'contents' => $data['biaya_masuk']
                    ],
                    [
                        'name' => 'waktu_start',
                        'contents' => $data['waktu_start']
                    ],
                    [
                        'name' => 'waktu_end',
                        'contents' => $data['waktu_end']
                    ],
                    [
                        'name' => 'banner_event',
                        'contents' => fopen(storage_path('app/' . $photoPath), 'r')
                    ],
                    [
                        'name' => 'status_event',
                        'contents' => $data['status_event']
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
            // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa banner_event
            $response = Http::post('http://localhost:8000/api/eo/events', $data);
        }
    
        // Periksa status respons dari API
        // if ($response->getStatusCode() === 200) {
        // Ambil id_event dari respons API
        $response = Http::get('http://localhost:8000/api/eo/events/user/'.$request->input('email'));
        $events = $response->json();

        $maxIdEvent = 0;
        foreach ($events['data'] as $event) {
            if ($event['id_event'] > $maxIdEvent) {
                $maxIdEvent = $event['id_event'];
            }
        }
        // Proses data checkbox dan kirim ke API event_area jika checkbox dipilih
        $checkboxes = $request->input('id_area');
        foreach ($checkboxes as $id_area) {
            $response = Http::post('http://localhost:8000/api/eo/event_area', [
                'id_event' => $maxIdEvent,
                'id_area' => $id_area,
                'keterangan' => null,
            ]);
        }
        // Lakukan tindakan lain setelah berhasil memproses formulir
        // misalnya, tampilkan pesan sukses, redirect ke halaman lain, dll.

        $response = Http::get('http://localhost:8000/api/eo/event_area/'.$maxIdEvent);
        $event_area = $response->json();
        $total_harga = 0;
        foreach($event_area['data'] as $item){
            $response = Http::get('http://localhost:8000/api/eo/areas/'.$item['id_area']);
            $area = $response->json();
            $total_harga = $total_harga + $area['data']['harga_sewa'];
        }

        $response = Http::get('http://localhost:8000/api/eo/events/'.$maxIdEvent);
        $eventnya = $response->json();

        return view('billing', compact('total_harga', 'event_area', 'eventnya'));
        // }
    
        // Jika terjadi kesalahan dalam mengirimkan data ke API
        // return redirect()->back()->with('error', 'Failed to submit form.');
    }

    public function selectTanggal()
    {
        return view('lets_make_event');
    }

    public function availableAreas(Request $request){
        $tanggal = $request->input('tanggal');
        $response = Http::get('http://localhost:8000/api/eo/showAvailableAreas/'.$tanggal);
        $availableAreas = $response->json();
        return view('booking', compact('availableAreas', 'tanggal'));
    }

    public function checkAvailability(Request $request){
        $waktu_start = $request->input('waktu_start');
        $waktu_end = $request->input('waktu_end');

        $response = Http::get('http://localhost:8000/api/eo/checkAvailability/'.$waktu_start.'/'.$waktu_end);
        $checkAvailability = $response->json();
        if($checkAvailability['data'] != null){
            return redirect('/gagal_booking');
        }
        
        return $this->bookingStore($request);
    }

    public function myEvent(Request $request){
        $email = $request->input('email');
        // $email = session('email');
        $response = Http::get('http://localhost:8000/api/eo/events/user/'.$email);
        $event_user = $response->json();
        return view('my_event', compact('event_user'));
    }

    public function myEvent_updateStatus(Request $request, $id){
        $email = $request->input('email');
        $response = Http::get('http://localhost:8000/api/eo/events/user/'.$email);
        $event_user = $response->json();
        $data = [
            'status_event' => 1,
        ];
        Http::put('http://localhost:8000/api/eo/events/'.$id, $data);
        return view('my_event', compact('event_user'));
    }

    public function detailEvent($id){
        $response = Http::get('http://localhost:8000/api/eo/events/'.$id);
        $event_data = $response->json();
        $event = $event_data['data'];
        $response = Http::get('http://localhost:8000/api/eo/event_area/'.$id);
        $event_area_data = $response->json();
        $event_area = $event_area_data['data'];
        return view('edit_event', compact('event', 'event_area'));
    }

    public function updateEvent(Request $request, $id)
    {
        $data = [
            'nama_event' => $request->input('nama_event'),
            'penyelenggara' => $request->input('penyelenggara'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'biaya_masuk' => $request->input('biaya_masuk'),
            'waktu_start' => $request->input('waktu_start'),
            'waktu_end' => $request->input('waktu_end'),
            'status_event' => $request->input('status_event'),
            'email' => $request->input('email')
        ];
    
        // Mengambil file foto dari request
        $photo = $request->file('banner_event');
    
        // Memeriksa apakah ada file foto yang diunggah
        if ($photo) {
            // Menyimpan file foto ke tempat sementara
            $photoPath = $photo->store('temp');
    
            $client = new Client();
    
            $response = $client->put('http://localhost:8000/api/eo/events/'.$id, [
                'multipart' => [
                    [
                        'name' => 'nama_event',
                        'contents' => $data['nama_event']
                    ],
                    [
                        'name' => 'penyelenggara',
                        'contents' => $data['penyelenggara']
                    ],
                    [
                        'name' => 'deskripsi_event',
                        'contents' => $data['deskripsi_event']
                    ],
                    [
                        'name' => 'biaya_masuk',
                        'contents' => $data['biaya_masuk']
                    ],
                    [
                        'name' => 'waktu_start',
                        'contents' => $data['waktu_start']
                    ],
                    [
                        'name' => 'waktu_end',
                        'contents' => $data['waktu_end']
                    ],
                    [
                        'name' => 'status_event',
                        'contents' => $data['status_event']
                    ],
                    [
                        'name' => 'banner_event',
                        'contents' => fopen(storage_path('app/' . $photoPath), 'r'),
                        // 'filename' => $photo->getClientOriginalName() // Menambahkan filename untuk foto
                    ],
                ],
            ]);
    
            // Menghapus file foto dari tempat sementara
            Storage::delete($photoPath);
        } else {
            // Jika tidak ada file foto yang diunggah, mengirim data ke API Laravel tanpa banner_event
            $response = Http::put('http://localhost:8000/api/eo/events/'.$id, $data);
        }
        return redirect('/my_event');
    }

    public function detailEvent2($id){
        $response = Http::get('http://localhost:8000/api/eo/events/'.$id);
        $event_data = $response->json();
        $event = $event_data['data'];
        $response = Http::get('http://localhost:8000/api/eo/event_area/'.$id);
        $event_area_data = $response->json();
        $event_area = $event_area_data['data'];
        $response = Http::get('http://localhost:8000/api/eo/areas');
        $area_data = $response->json();
        $area = $area_data['data'];
        return view('detail_event', compact('event', 'event_area', 'area'));
    }

    public function upcomingEvent(){
        $response = Http::get('http://localhost:8000/api/eo/events/upcoming');
        $event_data = $response->json();
        return view('upcoming_event', compact('event_data'));
    }

    public function billing_myEvent($id){
        $response = Http::get('http://localhost:8000/api/eo/event_area/'.$id);
        $event_area = $response->json();
        $total_harga = 0;
        foreach($event_area['data'] as $item){
            $response = Http::get('http://localhost:8000/api/eo/areas/'.$item['id_area']);
            $area = $response->json();
            $total_harga = $total_harga + $area['data']['harga_sewa'];
        }

        $response = Http::get('http://localhost:8000/api/eo/events/'.$id);
        $eventnya = $response->json();

        return view('billing', compact('total_harga', 'event_area', 'eventnya'));
    }
}
