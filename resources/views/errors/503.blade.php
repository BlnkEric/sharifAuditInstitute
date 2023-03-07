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
                <span style="
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-family: secondFont;
                font-size: 2rem;">
                    
                    <h1>
                        در حال بروزرسانی هستیم . . . 
                    </h1>
                    <p class="text-muted h5">
                        لطفا پس از گذشت چند ساعت مجددا تلاش کنید
                    </p>
                </span>

            </div>
        </div>
    </div>
</div>

@endsection
