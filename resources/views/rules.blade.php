@extends('front.layouts.app')
@section('content')

<div class="container-fluid accountContainer">
    <div class="container">
        <div class="row">
            {{-- Image Holder --}}
            <div class="col-12 col-lg-6 d-none d-lg-block" style="background-image: url('/images/prophecy.jpeg');">
                <section>
                    <span>Logo Goes Here</span> <span class="me-3"></span>
                </section>
                <section>
                    <h1>رسالت و ارزشها</h1>
                </section>
                <section>
                    <p>www.sharifmohaseb.com</p>
                </section>
            </div>
            <div class="text-center col-12 col-lg-6">

            </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection
