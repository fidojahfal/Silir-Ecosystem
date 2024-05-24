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

    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('tanggal') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="eventDate">Event Start:</label>
                        <input type="date" class="form-control" id="eventDate" name="tanggal" required>
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
