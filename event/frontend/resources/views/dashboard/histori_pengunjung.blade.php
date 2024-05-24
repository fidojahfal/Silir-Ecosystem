<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Silir</title>
    @include('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    @include('dashboard.navbar')
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Tiket Pengunjung</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('histori.store') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        @php
                            $response = Http::get('http://192.168.246.241:8080/api/v1/ticket');
                            $tiket = $response->json();
                            
                            $maxIdTiket = 0;
                            foreach ($tiket['data'] as $tiket) {
                                if ($tiket['ID'] > $maxIdTiket) {
                                    $maxIdTiket = $tiket['ID'];
                                }
                            }
                            
                            // $response = Http::get('http://192.168.246.241:8080/api/v1/ticketby/' . $maxIdTiket);
                            // $tiket_terbaru = $response->json();
                            // $tiket_terbaru = $tiket_terbaru['data'];
                            
                        @endphp
                        <label for="standName">Tiket Pengunjung:</label>
                        <input type="text" class="form-control" name="tiket_pengunjung"
                            placeholder="Masukkan Tiket Pengunjung" value="{{ $maxIdTiket }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <label for="id_event">Event :</label>
                        <select class="form-control select2" name="id_event" id="dropdown3" required>
                            @foreach ($event_data['data'] as $item)
                                <option value="{{ $item['id_event'] }}">{{ $item['nama_event'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-right"><br>
                    <button type="submit" value="submit" class="btn theme_btn button_hover">Submit</button>
                </div>
            </form>
        </div>
        <br>
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiket Pengunjung</th>
                    <th scope="col">ID Event</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histori_data['data'] as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['tiket_pengunjung'] }}</td>
                        <td>{{ $item['id_event'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('footer')
    @include('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Pilih opsi',
                allowClear: true,
                minimumInputLength: 1
            });
        });
    </script>
</body>

</html>
