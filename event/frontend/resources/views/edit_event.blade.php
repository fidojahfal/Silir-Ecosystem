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
                <h2 class="page-cover-tittle">Detail Event</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('event.updated', $event['id_event']) }}" method="post"
                id="contactForm" novalidate="novalidate">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="eventName">Event Name:</label>
                        <input type="text" class="form-control" id="eventName" name="nama_event"
                            placeholder="Enter event name" value="{{ $event['nama_event'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="eventName">Nama Penyelenggara:</label>
                        <input type="text" class="form-control" name="penyelenggara"
                            value="{{ $event['penyelenggara'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="text" class="form-control" id="price" name="biaya_masuk"
                            placeholder="Enter price for your event" value="{{ $event['biaya_masuk'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="idArea">Area :</label>
                        <input type="text" class="form-control" id="idArea" name="idArea"
                            value="@foreach ($event_area as $item) {{ $item['id_area'] . ', ' }} @endforeach" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="eventDate">Event Start:</label>
                        <input type="date" class="form-control" id="eventDate" name="waktu_start"
                            value="{{ $event['waktu_start'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="eventDate">Event End:</label>
                        <input type="date" class="form-control" id="eventDate" name="waktu_end"
                            value="{{ $event['waktu_end'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="desc_event">Description Event:</label>
                        <textarea class="form-control" name="deskripsi_event" id="desc_event" rows="3" placeholder="Enter Description">{{ $event['deskripsi_event'] }}</textarea>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="status_event" value="{{ $event['status_event'] }}">
                <input type="hidden" class="form-control" name="email" value="{{ $event['email'] }}">
                <div class="col-md-12 text-right"><br>
                    <button type="button" class="btn btn-secondary button_hover2" onclick="goBack()">Back</button>
                    <button type="submit" value="submit" class="btn theme_btn button_hover">Save</button>
                </div>
            </form>
        </div>
    </section>
    @include('footer')
    @include('script')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
