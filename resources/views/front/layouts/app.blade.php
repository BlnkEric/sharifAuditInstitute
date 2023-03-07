<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
   
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> 
</head>

<body>
            {{-- @include('components.navbar', ['services' => $services]) --}}
    @include('components.navbar')
    @yield('content')


<script src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
</script>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
    } else {
    navbar.classList.remove("sticky");
    }
}
</script>


<script>
    window.onload = function () {
      var isLoginSubmit = localStorage.getItem('LoginSubmit') === 'true';
      if (isLoginSubmit) {
        document.querySelectorAll('.registerErrors').forEach(function(el) {
            el.style.display = 'none';
        });
      }
      else {
        registerTab.style.right = '20%';
        loginTab.style.right = '-500px';
        document.querySelectorAll('.loginErrors').forEach(function(el) {
            el.style.display = 'none';
        });
      }
    };
  
    function disableError(btn) {
        if(btn === 'loginFormButt'){
            localStorage.setItem('LoginSubmit', 'true');
        }
        else {
            localStorage.setItem('LoginSubmit', 'false');
        }
    }
  </script>

<script>
    var loginTab = document.getElementById('loginTab');
    var registerTab = document.getElementById('registerTab');

    function changeLoginPosition() {
        registerTab.style.right = '20%';
        loginTab.style.right = '-500px';
    }

    function changeRegisterPosition() {
        registerTab.style.right = '120%';
        loginTab.style.right = '20%';
    }
</script>

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


</body>


</html>
