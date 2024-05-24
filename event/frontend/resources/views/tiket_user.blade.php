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
    <?php $tiket_user = Session::get('tiket_user'); ?>
    <?php if($tiket_user && array_key_exists('data', $tiket_user)):?>
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Ticket</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <section class="accomodation_area2 section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">My Ticket</h2>
            </div>
            <div class="row mb_30">
                @foreach ($tiket_user['data'] as $tiket)
                    @php
                        $response = Http::get('http://localhost:8000/api/eo/events/' . $tiket['id_event']);
                        $event = $response->json();
                        $event = $event['data'];
                    @endphp
                    <div class="col-lg-6 space-after-div">
                        <div style="margin-right: 10px; margin-left: 10px;">
                            <div class="accomodation_item">
                                <div class="hotel_img">
                                    @if ($event['banner_event'] == '')
                                        <img src="{{ asset('image/event.jpg') }}" alt=""
                                            style="max-width: 100%;">
                                    @else
                                        <img src="{{ 'http://localhost:8000/storage/banner_event/' . $event['banner_event'] }}"
                                            alt="" style="max-width: 100%;">
                                    @endif
                                </div>
                                <h4 class="sec_h4">{{ $event['nama_event'] }}</h4>
                            </div>
                            <h5 style="color: black;">Name <span style="padding-left: 100px; padding-right: 5px;">:
                                </span>{{ $tiket['nama'] }}</h5>
                            <h5 style="color: black;">Number of Ticket <span
                                    style="padding-left: 10px; padding-right: 5px;">:
                                </span>{{ $tiket['jumlah_tiket'] }}</h5>
                            <h5 style="color: black;">Date Event <span style="padding-left: 62px; padding-right: 5px;">:
                                </span>{{ date('d F, Y', strtotime($event['waktu_start'])) }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('footer')
    <?php else: ?>
    <script>
        window.location.href = "/check_my_ticket";
    </script>
    <?php endif; ?>
    @include('script')
</body>

</html>
