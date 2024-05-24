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
                <h2 class="page-cover-tittle">Upcoming Event</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <section class="accomodation_area2 section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Upcoming Event</h2>
            </div>
            <div class="row mb_30">
                @foreach ($event_data['data'] as $event)
                    <div class="col-lg-6 space-after-div">
                        <div style="margin-right: 10px; margin-left: 10px;">
                            <div class="accomodation_item">
                                <div class="hotel_img">
                                    @if ($event['banner_event'] == '')
                                        <img src="image/event.jpg" alt="" style="max-width: 100%;">
                                    @else
                                        <img src="{{ 'http://localhost:8000/storage/banner_event/' . $event['banner_event'] }}"
                                            alt="" style="max-width: 100%;">
                                    @endif
                                </div>
                                <a href="{{ route('event.detail2', $event['id_event']) }}">
                                    <h4 class="sec_h4">{{ $event['nama_event'] }}</h4>
                                </a>
                            </div>
                            <div class="accomodation_item2">
                                <p>{{ $event['deskripsi_event'] }}
                                </p>
                            </div>
                            <h6 style="color: black;">{{ date('d F, Y', strtotime($event['waktu_start'])) }}</h6>
                        </div>
                        <div style="text-align: center;">
                            <a href="{{ route('tiket.beli', $event['id_event']) }}"
                                class="btn theme_btn button_hover">Rp.
                                {{ number_format($event['biaya_masuk'], 0, ',', '.') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
