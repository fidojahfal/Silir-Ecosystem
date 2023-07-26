@extends('layouts.master-guest')
@section('content')
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Sign In</h2>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->
<section class="sample-text-area">
    <div class="container">
        <div class="card">
            <div class="card-body">
        <form class="row" action="#" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ $email ?? '' }}" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="col-md-12">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
            <div class="col-md-12 text-center"><br>
                <button type="submit" value="submit" class="btn theme_btn button_hover">Sign In</button>
            </div>
        </form>
        </div>
        </div>
    </div>
</section>
@endsection