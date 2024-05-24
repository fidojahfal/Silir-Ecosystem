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
                <h2 class="page-cover-tittle">Booking</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Booking</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            @if (count($availableAreas['data']) > 0)
                <form class="row" action="{{ route('booking.check') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="penyelenggara"
                                placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter email address" value="{{ session('email') ?? '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="eventName">Event Name:</label>
                            <input type="text" class="form-control" id="eventName" name="nama_event"
                                placeholder="Enter event name" required>
                        </div>
                        <div class="form-group">
                            <label for="eventName">Biaya Masuk:</label>
                            <input type="text" class="form-control" id="eventName" name="biaya_masuk"
                                placeholder="Enter event name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="area">Choose Area :</label>
                            <div class="row">
                                @foreach ($availableAreas['data'] as $area)
                                    @if ($area['id_area'] == 1)
                                        <div class="col-md-3">
                                            <div class="checkbox-container">
                                                <input type="checkbox" id="checkbox1" name="id_area[]" value="1">
                                                <label for="checkbox1">Area A</label>
                                            </div>
                                            <img src="image/areaA.jpeg" style="max-width: 100%; height: 200px;">
                                        </div>
                                    @endif
                                    @if ($area['id_area'] == 2)
                                        <div class="col-md-3">
                                            <div class="checkbox-container">
                                                <input type="checkbox" id="checkbox2" name="id_area[]" value="2">
                                                <label for="checkbox2">Area B</label>
                                            </div>
                                            <img src="image/areaB.jpeg" style="max-width: 100%; height: 200px;">
                                        </div>
                                    @endif
                                    @if ($area['id_area'] == 3)
                                        <div class="col-md-3">
                                            <div class="checkbox-container">
                                                <input type="checkbox" id="checkbox3" name="id_area[]" value="3">
                                                <label for="checkbox3">Area C</label>
                                            </div>
                                            <img src="image/AreaC.jpeg" style="max-width: 100%; height: 200px;">
                                        </div>
                                    @endif
                                    @if ($area['id_area'] == 4)
                                        <div class="col-md-3">
                                            <div class="checkbox-container">
                                                <input type="checkbox" id="checkbox4" name="id_area[]" value="4">
                                                <label for="checkbox4">Area D</label>
                                            </div>
                                            <img src="image/AreaD.jpg" style="max-width: 100%; height: 200px;">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="eventDate">Event Start:</label>
                            <input type="date" class="form-control" id="eventDate" name="waktu_start"
                                value="{{ $tanggal }}" required readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="eventDate">Event End:</label>
                            <input type="date" class="form-control" id="eventDate" name="waktu_end"
                                value="{{ $tanggal }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc_event">Description Event:</label>
                            <textarea class="form-control" name="deskripsi_event" id="desc_event" rows="3"
                                placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="attachment">Upload Banner :</label>
                            <input type="file" class="form-control-file" id="attachment" name="banner_event">
                        </div>
                    </div>
                    <div class="col-md-12 text-right"><br>
                        <button type="submit" value="submit" class="btn theme_btn button_hover">Submit</button>
                    </div>
                </form>
            @else
                <h3>Maaf, Semua Area Pada Tanggal Yang Dipilih Telah Digunakan</h3>
            @endif
        </div>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
