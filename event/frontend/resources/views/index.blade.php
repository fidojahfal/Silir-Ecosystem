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
        $event = $dataEvent['data'];
        $stand = $dataStand['data'];
        $area = $dataArea['data'];
        
        use Carbon\Carbon;
        $today = Carbon::now()->toDateString();
        $closestIndex = null;
        $closestDateDiff = null;
        foreach ($dataEvent['data'] as $index => $item) {
            $waktuStart = Carbon::parse($item['waktu_start'])->toDateString();
            $dateDiff = Carbon::parse($waktuStart)->diffInDays($today);
        
            if ($dateDiff >= 0 && ($closestDateDiff === null || $dateDiff < $closestDateDiff)) {
                $closestIndex = $index;
                $closestDateDiff = $dateDiff;
            }
        }
        
        $tanggalEventOnGoing = $dataEvent['data'][$closestIndex]['waktu_start'];
        $tanggalEventOnGoing = date('d F, Y', strtotime($tanggalEventOnGoing));
    @endphp
    @include('navbar')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h6>Book an event venue in Silir</h6>
                    <h2>Create a big Event</h2>
                    <p>If you are looking for an event venue, Silir is the top choice<br> with a cheap price safe clean
                        SILIR is Solution</p>
                    <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Get Started</a>
                </div>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Latest Blog Area  =================-->
    <section class="latest_blog_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">ON GOING EVENT</h2>
                <p>ongoing event in the Silir Tourest Area Semarang Indonesia</p>
            </div>
            <div class="row mb_30">
                <div class="col-lg-12">
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            @if ($dataEvent['data'][$closestIndex]['banner_event'] == '')
                                <img class="img-fluid" src="image/event.jpg" alt="Event Image">
                            @else
                                <img class="img-fluid"
                                    src="{{ 'http://localhost:8000/storage/banner_event/' . $dataEvent['data'][$closestIndex]['banner_event'] }}"
                                    alt="Event Image">
                            @endif
                        </div>
                        <div class="details">
                            <div class="tags">
                                <a href="{{ route('event.detail2', $dataEvent['data'][$closestIndex]['id_event']) }}"
                                    class="button_hover tag_btn">{{ $dataEvent['data'][$closestIndex]['nama_event'] }}</a>
                                <a href="#" class="button_hover tag_btn">Going On</a>
                            </div>
                            <a href="#">
                                <h4 class="sec_h4"{{ $dataEvent['data'][$closestIndex]['nama_event'] }}</h4>
                            </a>
                            <p>{{ $dataEvent['data'][$closestIndex]['deskripsi_event'] }}
                            </p>
                            <h6 class="date title_color">{{ $tanggalEventOnGoing }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color2">List Stand</h2>
                <p style="color: white;">Stand in the Silir Tourest Area Semarang Indonesia</p>
            </div>
            <div class="row mb_30">
                @php
                    $filteredStand = array_filter($stand, function ($item) {
                        return $item['status_stand'] == 1;
                    });
                    $counter = 0;
                @endphp
                @foreach ($filteredStand as $item)
                    <div class="col-lg-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="image/areaA.jpeg" alt="" style="max-width: 500px;">
                                <a href="{{ route('stand.register') }}" class="btn theme_btn button_hover">Register
                                    Stand</a>
                            </div>
                            <a href="#">
                                <h4 class="thi_h4">{{ $item['nama_stand'] }}</h4>
                            </a>
                            <h5>Area {{ $item['id_area'] }}</h5>
                        </div>
                    </div>
                    @php
                        $counter++;
                        if ($counter >= 2) {
                            break; // Menghentikan iterasi setelah 2 indeks
                        }
                    @endphp
                @endforeach
            </div>
            <div align="center" style="margin-top:25px;">
                <a href="{{ route('stand') }}" class="btn theme_btn button_hover">More</a>
            </div>
        </div>
    </section>

    <!--================ Accomodation Area  =================-->

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
                        <a href="{{ route('pick_date_for_event') }}" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="image/AreaC.jpeg" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->

    @include('footer')
    @include('script')
</body>

</html>
