<nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">

                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}">حساب کاربری</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    <li>
                        <a href="#!">خانه</a>
                    </li>
                    <li>
                        <a href="#!">درباره ما</a>
                    </li>

                    {{-- MOHEMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM --}}
                    {{-- <li>
                        <a href="#!">خدمات</a>
                        <ul class="nav-dropdown">

                            @foreach ($services as $service)
                                <li>
                                    <a href="#!">{{ $service->name }}</a>
                                    @if(count($service->specialServices))
                                    <ul class="nav-dropdown">
                                        @foreach($service->specialServices as $sp_ser)
                                            <li>
                                                <a class="dropdown-item" href="#" style="border:1px solid #ccc;">
                                                    {{ $sp_ser->name }}
                                                </a>                                        
                                            </li>                                        
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li> --}}
                    <li>
                        <a href="#!">Pricing</a>
                    </li>
                    <li>
                        <a href="#!">Portfolio</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">Web Design</a>
                            </li>
                            <li>
                                <a href="#!">Web Development</a>
                            </li>
                            <li>
                                <a href="#!">Graphic Design</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">ارتباط با ما</a>
                    </li>
                </ul>
            </nav>








            nav:not(.paginator) {
    float: right;
}

nav:not(.paginator) ul {
    list-style: none;
    margin: 0;
    padding: 0;
    transition: 0.4s linear;
}

nav:not(.paginator) ul li {
    float: left;
    position: relative;
    transition: 0.4s linear;
}

nav:not(.paginator) ul li a,
nav:not(.paginator) ul li a:visited {
    display: block;
    padding: 0 20px;
    line-height: var(--navbarHeight);
    background: black;
    color: white;
    transition: 0.4s linear;
    font-family: secondFont;
    font-weight: 500;
    font-size: 1.3rem;
    text-decoration: none;
}

nav:not(.paginator) ul li a:hover,
nav:not(.paginator) ul li a:visited:hover {
    color: var(--secondColor);
    border-bottom: 3px solid var(--secondColor);
}

nav:not(.paginator) ul li a:not(:only-child):after,
nav:not(.paginator) ul li a:visited:not(:only-child):after {
    padding-left: 4px;
    content: " ▾";
}

nav:not(.paginator) ul li ul li {
    min-width: 190px;
}

nav:not(.paginator) ul li ul li a {
    padding: 15px;
    line-height: 20px;
}

.nav-dropdown {
    position: absolute;
    display: none;
    z-index: 1000;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
}
