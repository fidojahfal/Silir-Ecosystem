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
    @include('navbar')
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Gallery</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Gallery</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <!--================Breadcrumb Area =================-->
    <section class="gallery_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Silir Gallery</h2>
                <p>Who are in extremely love with eco friendly system.</p>
            </div>
            <div class="row gallery-item">
                <div class="col-md-4">
                    <a href="image/areaA.jpeg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/areaA.jpeg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="image/areaB.jpeg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/areaB.jpeg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="image/AreaC.jpeg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/AreaC.jpeg);"></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="image/AreaD.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/AreaD.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="image/AreaE.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/AreaE.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="image/event.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/event.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="image/hehe2.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/hehe2.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="image/hehe3.jpg" class="img-gal">
                        <div class="single-gallery-image" style="background: url(image/hehe3.jpg);"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    @include('footer')
    @include('script')
</body>

</html>
