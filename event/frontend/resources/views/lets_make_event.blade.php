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

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="banner_content text-center"><br><br>
                    <h6>Looking a Place for Event?</h6><br><br>
                    <h2>LET'S MAKE YOUR EVENT HERE</h2><br><br>

                    <form action="{{ route('pick_date') }}" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_date" style="font-size: 20px;">Select Date</label>
                                    <input type="date" class="form-control" id="event_date" name="tanggal" required>
                                </div>
                            </div>
                        </div><br><br>
                        <button type="submit" value="submit" class="btn theme_btn button_hover">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->
    @include('footer')
    @include('script')
</body>

</html>
