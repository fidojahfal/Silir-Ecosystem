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
                <h2 class="page-cover-tittle">Detail Stand</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('stand.update', $stand['id_stand']) }}" method="post"
                id="contactForm" novalidate="novalidate">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="standName">Stand Name:</label>
                        <input type="text" class="form-control" id="standName" name="nama_stand"
                            placeholder="Enter stand name" value="{{ $stand['nama_stand'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="idArea">Area :</label>
                        <select class="form-control custom-select" id="payment" name="id_area" required>
                            @foreach ($semua_area as $area)
                                @if ($area['id_area'] == $area_stand['id_area'])
                                    <option value="{{ $area['id_area'] }}" selected>{{ $area['nama_area'] }}</option>
                                @else
                                    <option value="{{ $area['id_area'] }}">{{ $area['nama_area'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="desc_event">Description Event:</label>
                        <textarea class="form-control" name="deskripsi_stand" id="desc_event" rows="3" placeholder="Enter Description">{{ $stand['deskripsi_stand'] }}</textarea>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="email" value="{{ $stand['email'] }}">
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
