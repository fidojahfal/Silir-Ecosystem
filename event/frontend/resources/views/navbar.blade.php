<!--================Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ route('index') }}"><img style="max-width: 150px"
                    src="{{ asset('logo/logo-landscape.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    @if (session('role'))
                        @if (session('role') == 'admin')
                            <li class="nav-item active"><a class="nav-link"
                                    href="{{ route('dashboard.event') }}">Dashboard</a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('area') }}">List Area</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('upcoming_event') }}">Buy Event Tickets</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('event.user') }}">My Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stand.user') }}">My Stands</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tiket.user') }}">My Tickets</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://192.168.246.241:7778/">Portal</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================Header Area =================-->
