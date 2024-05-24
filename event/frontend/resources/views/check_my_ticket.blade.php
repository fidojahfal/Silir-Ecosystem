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
                <h2 class="page-cover-tittle">Cek Tiket Saya</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('tiketUser') }}" method="post" id="contactForm"
                novalidate="novalidate">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ session('email') ?? '' }}" readonly>
                    </div>
                </div>
                <div class="col-md-12 text-right"><br>
                    <button type="submit" value="submit" class="btn theme_btn button_hover">Submit</button>
                </div>
            </form>
        </div>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
