<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Silir</title>
    @include('stylesheet')
</head>

<body>
    @include('dashboard.navbar')
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Dashboard Ticket</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiket_data['data'] as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['id_event'] }}</td>
                        <td>{{ $item['jumlah_tiket'] }}</td>
                        <td><a
                                href="{{ 'http://localhost:8000/storage/bukti_pembayaran/' . $item['bukti_pembayaran'] }}">
                                <button type="submit" value="Bukti" class="btn theme_btn button_hover"><i
                                        class="fa fa-pencil"></i></button>
                            </a>
                        </td>
                        <td><a href="{{ route('dashboard.tiket.confirm', $item['id']) }}">
                                @if ($item['status'] == 1)
                                    <input class="btn btn-primary btn-inverse" type="button"
                                        value="{{ $item['status'] }}" />
                                @else
                                    <input class="btn btn-danger btn-inverse" type="button"
                                        value="{{ $item['status'] }}" />
                                @endif
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
