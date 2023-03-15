@extends('front.layouts.app')

@section('content')

<div class="container-fluid mainIntroContactUs">
    <div class="container">
        <div class="row">
            <section>

            </section>
            <div id="mainIntroContactUsClippath"></div>
        </div>
    </div>
</div>

<div class="container-fluid contactContainer">
    <div class="container" id="scrolltoContactus">
        <div class="row">
            <h1>با ما در ارتباط باشيد</h1>
        </div>
        <div class="row contactUsRow">
            <div class="col-12 col-md-4">
                <div>
                    <section class="contactUsRowIconContainer">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </section>
                </div>
                <h3>آدرس دفتر</h3>
                <div>
                    <h4>موسسه حقوقی شریف محاسب مانا</h4>
                    <p class="mt-2"> مشهد، بلوار دانش آموز, دانش آموز 19, جنب ساختمان بانک مسکن، طبقه اول و دوم</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div>
                    <section class="contactUsRowIconContainer">
                        <i class="fa-solid fa-phone"></i>
                    </section>
                </div>
                <h3>تلفن های ثابت دفتر</h3>
                <div>
                    <h4>موسسه حقوقی شریف محاسب مانا</h4>
                    <p class="mt-2">0513-2419292</p>
                    <p class="mt-2">0513-2419292</p>
                    <p class="mt-2">0513-2419292</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div>
                    <section class="contactUsRowIconContainer">
                        <i class="fa-solid fa-message"></i>
                    </section>
                </div>
                <h3>ایمیل های سازمانی</h3>
                <div>
                    <h4>موسسه حقوقی شریف محاسب مانا</h4>
                    <p class="mt-2">sharifmohasemana@info.com</p>
                    <p class="mt-2">sharifmohasemana@info.com</p>
                    <p class="mt-2">sharifmohasemana@info.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Form --}}
<div class="container-fluid contactUsFormContainer">
    <div class="container" id="scrolltoCommentForm">
        <div class="row">
            <div class="col-12 col-md-6">
                <section>
                    <h1>نظرات و پیشنهادات</h1>
                    <p>
                        شما میتوانید هر گونه انتقاد , پیشنهاد و یا تجربیات کاربری خود را از طریق این فرم به گوش ما برسانید...
                        تمام تلاش ما این است که بهترین تجربه کاربری را برای شما فراهم کنیم. بدین منظور نظر شما در پیشبرد و بهبود خدماتی که ارائه میدهیم بسیار حائز اهمیت خواهد بود. 
                    </p>
                </section>
            </div>
            <div class="col-12 col-md-6">
                <form action="" class="contactUsForm">
                    <div>
                        <label for="name">اسم</label>
                        <input type="text" name="name" class="ms-3" placeholder="Name"><input type="text">
                    </div>
                    <div>
                        <input type="text" name="name" class="ms-3" placeholder="Name">
                    </div>
                    <div>
                        <label for="message">متن</label>
                        <textarea name="message" cols="30" rows="10" placeholder="Describe yourself here..."></textarea>
                    </div>
                    <button>ثبت</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components.footer')

@endsection
