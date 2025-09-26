<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">  
            <a class="navbar-brand" href="#" style="margin-left: 20px;"> 
                <img src="/dist/assets/img/logo.png" alt="Event Manager Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.events') ? 'active' : '' }}" href="{{ route('frontend.events') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">EVENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog-section">BLOG</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="venuesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            VENUES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="venuesDropdown">
                            <li><a class="dropdown-item" href="{{ route('venues.wedding') }}">Wedding Venues</a></li>
                            <li><a class="dropdown-item" href="{{ route('venues.conference') }}">Conference Halls</a></li>
                            <li><a class="dropdown-item" href="{{ route('venues.party') }}">Party Spaces</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="{{ route('lang.change', ['lang' => 'en']) }}">English</a></li>
                            <li><a class="dropdown-item" href="{{ route('lang.change', ['lang' => 'fr']) }}">French</a></li>
                            <li><a class="dropdown-item" href="{{ route('lang.change', ['lang' => 'it']) }}">Italian</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="#contact" style="color: white; font-weight: bold; padding: 5px 10px;">
                            <i class="fas fa-envelope"></i> CONTACT US
                        </a>
                    </li>
                </ul>
                
                <!-- Right Aligned Authentication Links -->
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm me-2" href="{{ route('frontend.events') }}">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger btn-sm" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               LOGOUT
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm me-2" href="{{ route('login') }}">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('register') }}">REGISTER</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
