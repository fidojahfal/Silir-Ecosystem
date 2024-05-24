<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Silir</title>
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <?php $stand_user = Session::get('stand_user');
    $data_area = Session::get('data_area');
    if($stand_user && array_key_exists('data', $stand_user)):?>
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Stand</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <section class="accomodation_area2 section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">My Stand</h2>
            </div>
            <div class="row mb_30">
                @foreach ($stand_user['data'] as $stand)
                    <div class="col-lg-6">
                        <div class="accomodation_item text-center">
                            <a href="{{ route('stand.edit', $stand['id_stand']) }}">
                                <h4 class="sec_h4">{{ $stand['nama_stand'] }}</h4>
                            </a>
                            <a href="{{ route('stand.edit', $stand['id_stand']) }}">
                                <div class="hotel_img">
                                    @if ($stand['foto_stand'] == '')
                                        <img src="{{ asset('image/areaA.jpeg') }}" alt=""
                                            style="max-width: 500px;">
                                    @else
                                        <img src="{{ 'http://localhost:8000/storage/foto_stand/' . $stand['foto_stand'] }}"
                                            alt="" style="max-width: 500px;">
                                    @endif
                                </div>
                            </a>
                            <p>{{ $stand['deskripsi_stand'] }}</p>
                            @if ($stand['status_stand'] == 0)
                                @if ($stand['id_area'] == 1)
                                    <h5>{{ $data_area['data'][0]['harga_buka_stand'] }}<small>/Days</small></h5>
                                @endif
                                @if ($stand['id_area'] == 2)
                                    <h5>{{ $data_area['data'][1]['harga_buka_stand'] }}<small>/Days</small></h5>
                                @endif
                                @if ($stand['id_area'] == 3)
                                    <h5>{{ $data_area['data'][2]['harga_buka_stand'] }}<small>/Days</small></h5>
                                @endif
                                @if ($stand['id_area'] == 4)
                                    <h5>{{ $data_area['data'][3]['harga_buka_stand'] }}<small>/Days</small></h5>
                                @endif
                                <a href="{{ route('stand.billing', $stand['id_stand']) }}"
                                    class="btn theme_btn button_hover">Bayar Untuk Buka Stand</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('footer')
    <?php else: ?>
    <script>
        window.location.href = "/check_my_stand";
    </script>
    <?php endif; ?>
    @include('script')
</body>

</html>
