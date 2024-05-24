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
    @php
        $stand = $dataStand['data'];
    @endphp
    @include('navbar')
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">About Stand</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Stand</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <section class="accomodation_area2 section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">List Stand</h2>
                <p style="color: black;">Stand in the Silir Tourest Area Semarang Indonesia</p>
            </div>
            <div class="row mb_30">
                @php
                    $filteredStand = array_filter($stand, function ($item) {
                        return $item['status_stand'] == 1;
                    });
                @endphp
                @foreach ($filteredStand as $item)
                    <div class="col-lg-6">
                        <div class="accomodation_item text-center">
                            <a href="#">
                                <h4 class="sec_h4">{{ $item['nama_stand'] }}</h4>
                            </a>
                            <div class="hotel_img">
                                @if ($item['foto_stand'] == '')
                                    <img src="image/areaA.jpeg" alt="" style="max-width: 500px;">
                                @else
                                    <img src="{{ 'http://localhost:8000/storage/foto_stand/' . $item['foto_stand'] }}"
                                        alt="" style="max-width: 500px;">
                                @endif
                            </div>
                            <p>{{ $item['deskripsi_stand'] }}</p>
                            {{-- <h5>$100<small>/Days</small></h5>
                            <a href="booking.html" class="btn theme_btn button_hover">Book Now</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 40px;">

                <a href="{{ route('stand.register') }}" class="btn theme_btn button_hover">Daftarkan Stand Anda</a>
            </div>
        </div>
    </section>

    @include('footer')
    @include('script')
</body>

</html>
