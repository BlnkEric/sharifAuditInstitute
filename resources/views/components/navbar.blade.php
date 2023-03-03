<style>
</style>
<div>
    <section class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a href="#!">Logo</a>
            </div>
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
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</div>

