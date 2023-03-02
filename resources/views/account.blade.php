@extends('front.layouts.app')

<div class="container-fluid accountContainer">
    <div class="container">
        <div class="row">
            {{-- Image Holder --}}
            <div class="col-12 col-md-6">
                <section>
                    <span>LogoName</span> <span class="me-3">عموی شاهین</span>
                </section>
                <section>
                    <h1>به سایت ارش خوش امدید</h1>
                </section>
                <section>
                    <p>www.arash.com</p>
                </section>
            </div>
            <div class="col-12 col-md-6">
                <section id="loginTab">
                    <h2>ورود</h2>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ایمیل">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="رمز عبور">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div> --}}

                        <button type="submit" class="accountSubmitBtn">
                            ورود
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </form>


                </section>
                <section id="registerTab">
                    <h2>ثبت نام</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus  placeholder="نام کاربری">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="ایمیل">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="phone" type="phone" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autofocus placeholder="تلفن همراه">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="رمز عبور">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="تکرار رمز عبور">

                        <button type="submit" class="accountSubmitBtn">
                            ثبت نام
                        </button>
                    </form>

                </section>
                <button onclick="changeLoginPosition()" id="LoginChangeBtn">ثبت نام</button>
                <button onclick="changeRegisterPosition()" id="RegisterChangeBtn">ورود</button>
            </div>
        </div>
    </div>
</div>
<script>
    var loginTab = document.getElementById('loginTab');
    var registerTab = document.getElementById('registerTab');

    function changeLoginPosition() {
        registerTab.style.right = '20%'
        loginTab.style.right = '-500px';
    }

    function changeRegisterPosition() {
        registerTab.style.right = '120%'
        loginTab.style.right = '20%';
    }
</script>
