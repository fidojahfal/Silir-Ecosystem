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
                <h2 class="page-cover-tittle">Dashboard Area</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name Area</th>
                    <th scope="col">Luas Area</th>
                    <th scope="col">Slot Stand</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Harga Buka Stand</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($area_data['data'] as $item)
                    <tr>
                        <th scope="row">{{ $item['id_area'] }}</th>
                        <td>{{ $item['nama_area'] }}</td>
                        <td>{{ $item['luas_area'] }}</td>
                        <td>{{ $item['slot_stand'] }}</td>
                        <td>{{ $item['harga_sewa'] }}</td>
                        <td>{{ $item['harga_buka_stand'] }}</td>
                        <td>{{ $item['status_area'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
