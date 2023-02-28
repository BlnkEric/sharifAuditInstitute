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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
                            <a href="{{ route('admin.services.index') }}" class="nav-link">مدیریت خدمات</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.proposals.index') }}" class="nav-link">مدیریت پروپوزال‌ها</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.industries.index') }}" class="nav-link">مدیریت صنایع</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.articles.index') }}" class="nav-link">مدیریت مقالات</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.staffs.index') }}" class="nav-link">مدیریت کارمندان</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.clients.index') }}" class="nav-link">مدیریت مشتریان</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.jobOffers.index') }}" class="nav-link">مدیریت موقعیت های شغلی</a>
                        </li>
                    @endguest


                </ul>
                {{-- </div> --}}
            </nav>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</div>
<script>
    (function($) { // Begin jQuery
        $(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                // Close one dropdown when selecting another
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
                $('.nav-dropdown').hide();
            });
            // Toggle open and close nav styles on click
            $('#nav-toggle').click(function() {
                $('nav ul').slideToggle();
            });
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });
        }); // end DOM ready
    })(jQuery); // end jQuery
</script>
