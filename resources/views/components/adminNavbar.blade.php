<style>
</style>
<div>
    <section class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a href="#!">Logo</a>
            </div>
            <nav>
                {{-- <div class="container"> --}}

                <ul class="nav-list">
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}
    


                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
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
                        <li>
                            <a href="{{ route('admin.services.index') }}">مدیریت خدمات</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.industries.index') }}">مدیریت صنایع</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.articles.index') }}">مدیریت مقالات</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.staffs.index') }}">مدیریت کارمندان</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.clients.index') }}">مدیریت مشتریان</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.jobOffers.index') }}">مدیریت موقعیت های شغلی</a>
                        </li>
                    @endguest


                </ul>
                {{-- </div> --}}
            </nav>
        </div>
    </section>
</div>