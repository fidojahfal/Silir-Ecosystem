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
                <h2 class="page-cover-tittle">Transaction Stand</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('myStand_updateStatus', $stand['id_stand']) }}" method="post"
                id="contactForm" novalidate="novalidate">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="standName">Stand Name :</label>
                        <input type="text" class="form-control" id="standName" name="standName"
                            value="{{ $stand['nama_stand'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="desc_event">Description :</label>
                        <textarea class="form-control" name="deskripsi_stand" id="desc_event" rows="3" placeholder="Enter Description">{{ $stand['deskripsi_stand'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $stand['email'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="idArea">Area :</label>
                        <input type="text" class="form-control" id="idArea" name="idArea"
                            value="{{ $area['nama_area'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="text" class="form-control" id="idArea" name="idArea"
                            value="{{ $area['harga_buka_stand'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="total">Total :</label>
                        <input type="text" class="form-control" id="total" name="total"
                            value="{{ $area['harga_buka_stand'] }}" readonly>
                    </div>
                </div>

                <div class="col-md-12 text-right"><br>
                    <button type="button" class="btn btn-secondary button_hover2" onclick="goBack()">Back</button>
                    <button type="submit" value="submit" class="btn theme_btn button_hover">Buy</button>
                </div>
            </form>
        </div>
    </section>
    @include('footer')
    @include('script')
</body>

</html>
