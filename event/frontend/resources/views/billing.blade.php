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
                <h2 class="page-cover-tittle">Transaction</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('myEvent_updateStatus', $eventnya['data']['id_event']) }}"
                method="post" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $eventnya['data']['penyelenggara'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $eventnya['data']['email'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eventName">Event Name:</label>
                        <input type="text" class="form-control" id="eventName" name="eventName"
                            value="{{ $eventnya['data']['nama_event'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="idArea">Area :</label>
                        <input type="text" class="form-control" id="idArea" name="idArea"
                            value="@foreach ($event_area['data'] as $item) {{ $item['id_area'] . ', ' }} @endforeach"
                            readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="payment">Payment :</label>
                    <div class="form-group text-center">
                        <select class="form-control custom-select" id="payment" name="payment" required>
                            <option value="" selected disabled>-- Pilih Payment --</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="PayPal">PayPal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total">Total :</label>
                        <input type="text" class="form-control" id="total" name="total"
                            value="{{ $total_harga }}" readonly>
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
