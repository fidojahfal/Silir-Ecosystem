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
        $area = $dataArea['data'];
    @endphp
    @include('navbar')

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Area</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Area</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <!--================ About History Area  =================-->
    <section class="about_history_area2 section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title title_color">About Area</h2>
                        <p>Area in the Silir Tourest Area Semarang Indonesia, silir area is an area that can be rented
                            out to costumers for event or private events
                            <br>Area in the Silir has several different prices an well as the facilities that can be
                            obtained
                            Similir has Several Areas, namely Area A,Area B, Area C, Area D, Area E
                        </p>
                        <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Create Event</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="image/AreaC.jpeg" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->

    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="row mb_30">
                <div class="col-lg-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/areaA.jpeg" alt="" style="max-width: 500px;">
                        </div>
                        <a href="#">
                            <h4 class="thi_h4">AREA A</h4>
                        </a>
                        <h5>Rp. {{ number_format($area[0]['harga_sewa'], 0, ',', '.') }}<small>/Days</small></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accomodation_item2 text-center">
                        <h5>Detail Area A ({{ $area[0]['nama_area'] }})</h5><br>
                        <h4>Luas: {{ $area[0]['luas_area'] }} m²</h4>
                        <h4>Slot Stand: {{ $area[0]['slot_stand'] }}</h4>
                        <h4>Harga Satuan Buka Stand: Rp. {{ number_format($area[0]['harga_buka_stand'], 0, ',', '.') }}
                        </h4><br>
                        <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Create Event</a>
                        <a href="{{ route('stand.register') }}" class="btn theme_btn button_hover">Register Your
                            Stand</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="accomodation_area2 section_gap">
        <div class="container">
            <div class="row mb_30">
                <div class="col-lg-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/areaB.jpeg" alt="" style="max-width: 500px;">
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">AREA B</h4>
                        </a>
                        <h5>Rp. {{ number_format($area[1]['harga_sewa'], 0, ',', '.') }}<small>/Days</small></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accomodation_item3 text-center">
                        <h5>Detail Area B ({{ $area[1]['nama_area'] }})</h5><br>
                        <h4>Luas: {{ $area[1]['luas_area'] }} m²</h4>
                        <h4>Slot Stand: {{ $area[1]['slot_stand'] }}</h4>
                        <h4>Harga Satuan Buka Stand: Rp. {{ number_format($area[1]['harga_buka_stand'], 0, ',', '.') }}
                        </h4><br>
                        <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Create
                            Event</a>
                        <a href="{{ route('stand.register') }}" class="btn theme_btn button_hover">Register Your
                            Stand</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="row mb_30">
                <div class="col-lg-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/AreaC.jpeg" alt="" style="max-width: 500px;">
                        </div>
                        <a href="#">
                            <h4 class="thi_h4">AREA C</h4>
                        </a>
                        <h5>Rp. {{ number_format($area[2]['harga_sewa'], 0, ',', '.') }}<small>/Days</small></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accomodation_item2 text-center">
                        <h5>Detail Area C ({{ $area[2]['nama_area'] }})</h5><br>
                        <h4>Luas: {{ $area[2]['luas_area'] }} m²</h4>
                        <h4>Slot Stand: {{ $area[2]['slot_stand'] }}</h4>
                        <h4>Harga Satuan Buka Stand: Rp. {{ number_format($area[2]['harga_buka_stand'], 0, ',', '.') }}
                        </h4><br>
                        <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Create
                            Event</a>
                        <a href="{{ route('stand.register') }}" class="btn theme_btn button_hover">Register Your
                            Stand</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="accomodation_area2 section_gap">
        <div class="container">
            <div class="row mb_30">
                <div class="col-lg-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/AreaD.jpg" alt="" style="max-width: 500px;">
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">AREA D</h4>
                        </a>
                        <h5>Rp. {{ number_format($area[3]['harga_sewa'], 0, ',', '.') }}<small>/Days</small></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accomodation_item3 text-center">
                        <h5>Detail Area D ({{ $area[3]['nama_area'] }})</h5><br>
                        <h4>Luas: {{ $area[3]['luas_area'] }} m²</h4>
                        <h4>Slot Stand: {{ $area[3]['slot_stand'] }}</h4>
                        <h4>Harga Satuan Buka Stand: Rp. {{ number_format($area[3]['harga_buka_stand'], 0, ',', '.') }}
                        </h4><br>
                        <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Create
                            Event</a>
                        <a href="{{ route('stand.register') }}" class="btn theme_btn button_hover">Register Your
                            Stand</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->
    @include('footer')
    @include('script')
</body>

</html>
