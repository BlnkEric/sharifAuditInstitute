@extends('front.layouts.app')
@section('content')

<div class="container-fluid accountContainer">
    <div class="container">
        <div class="row">
            {{-- Image Holder --}}
            <div class="col-12 col-lg-6 d-none d-lg-block">
                <section>
                    <span>Logo Goes Here</span> <span class="me-3"></span>
                </section>
                <section>
                    <h1>به وبسایت موسسه شریف خوش آمدید</h1>
                </section>
                <section>
                    <p>www.sharifmohaseb.com</p>
                </section>
            </div>
            <div class="text-center col-12 col-lg-6">
                <section id="loginTab">
                    <h2>ورود</h2>


                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                        @csrf
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ایمیل">
                        @error('email')
                            <span class="loginErrors invalid-feedback badge bg-danger badge-lg" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="رمز عبور">
                        @error('password')
                            <span class="loginErrors invalid-feedback badge bg-danger badge-lg" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button type="submit" form="loginForm" id="loginFormButt" class="accountSubmitBtn" onclick="disableError(this)">
                            ورود
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                            </a>
                        @endif
                    </form>


                </section>
                <section class="text-center" id="registerTab">
                    <h2>ثبت نام</h2>

                    <form method="POST" id="registerForm" action="{{ route('register') }}">
                        @csrf

                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus  placeholder="نام کاربری">
                        @error('name')
                            <span class="registerErrors invalid-feedback badge bg-danger badge-lg" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="ایمیل">
                        @error('email')
                            <span class="registerErrors invalid-feedback badge bg-danger badge-lg" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="phone" type="phone" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autofocus placeholder="تلفن همراه">
                        @error('phone')
                            <span class="registerErrors invalid-feedback badge bg-danger badge-lg" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="رمز عبور">
                        @error('password')
                            <span class="registerErrors invalid-feedback badge bg-danger badge-lg" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="تکرار رمز عبور">

                        <button type="submit" form="registerForm" id="registerFormButt" class="accountSubmitBtn" onclick="disableError(this)">
                            ثبت نام
                        </button>
                    </form>

                </section>
                <button onclick="changeRegisterPosition()" id="RegisterChangeBtn">ورود</button>
                <button onclick="changeLoginPosition()" id="LoginChangeBtn">ثبت نام</button>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection
