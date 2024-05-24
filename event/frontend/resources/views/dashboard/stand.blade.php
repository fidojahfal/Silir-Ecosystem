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
                <h2 class="page-cover-tittle">Dashboard Stand</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Stand Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Area</th>
                    <th scope="col">Status</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stand_data['data'] as $item)
                    <tr>
                        <th scope="row">{{ $item['id_stand'] }}</th>
                        <td>{{ $item['nama_stand'] }}</td>
                        <td>{{ $item['deskripsi_stand'] }}</td>
                        <td>{{ $item['id_area'] }}</td>
                        <td>{{ $item['status_stand'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['foto_stand'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
