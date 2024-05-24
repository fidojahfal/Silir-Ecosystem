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
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Event Now</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <section class="accomodation_area2 section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">EVENT DETAIL</h2>
            </div>
            <div class="row mb_30">
                <div class="col-lg-12">
                    <div style="margin-right: 10px; margin-left: 10px;">
                        <div class="accomodation_item text-center">
                            <a href="{{ route('event.detail2', $event['id_event']) }}">
                                <h4 class="sec_h4">{{ $event['nama_event'] }}</h4>
                            </a>
                            <div class="hotel_img">
                                @if ($event['banner_event'] == '')
                                    <img src="{{ asset('image/event.jpg') }}" alt=""
                                        style="max-width: 60%; max-height: 50%;">
                                @else
                                    <img src="{{ 'http://localhost:8000/storage/banner_event/' . $event['banner_event'] }}"
                                        alt="" style="max-width: 60%; max-height: 50%;">
                                @endif
                            </div>
                        </div>
                        <h6 style="color: black; text-align: right; margin-right: 20%;">
                            {{ date('d F, Y', strtotime($event['waktu_start'])) }}</h6>
                        <div class="accomodation_item2">
                            <p style=" margin-left: 20%; margin-right: 20%;">{{ $event['deskripsi_event'] }}
                            </p>
                            <p style="margin-left: 20%; margin-right: 20%;">Price Enter : {{ $event['biaya_masuk'] }}
                            </p>
                            <p style="margin-left: 20%; margin-right: 20%;">Event Start :
                                {{ date('d F, Y', strtotime($event['waktu_start'])) }}</p>
                            <p style="margin-left: 20%; margin-right: 20%;">Event End :
                                {{ date('d F, Y', strtotime($event['waktu_end'])) }}</p>
                            <p style="margin-left: 20%; margin-right: 20%;">In Area : @foreach ($event_area as $item)
                                    @if ($item['id_area'] == 1)
                                        {{ $area[0]['nama_area'] . ', ' }}
                                    @endif
                                    @if ($item['id_area'] == 2)
                                        {{ $area[1]['nama_area'] . ', ' }}
                                    @endif
                                    @if ($item['id_area'] == 3)
                                        {{ $area[2]['nama_area'] . ', ' }}
                                    @endif
                                    @if ($item['id_area'] == 4)
                                        {{ $area[3]['nama_area'] . ', ' }}
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <a href="{{ route('tiket.beli', $event['id_event']) }}" class="btn theme_btn button_hover">Rp.
                            {{ number_format($event['biaya_masuk'], 0, ',', '.') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
