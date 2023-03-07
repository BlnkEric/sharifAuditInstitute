<div class="container-fluid footerContainer ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <section>
                    <h1>گالری تصاویر</h1>
                    <h2>تصاویر مختلف از رویدادهای مهم , جلسات , لوگو مشتریان با سابقه و سایر تصاویر موجود در آرشیو موسسه</h2>
                    <button class="buttonVersion1"><span>ازش بوس </span></button>
                    <ul>
                        <li>
                            <div class="ms-2"><i class="fa-solid fa-phone"></i></div><span>ارتباط با ما</span>
                        </li>
                        <li>
                            <div class="ms-2"><i class="fa-solid fa-balance-scale"></i></div><span>قوانین و شاخص ها</span>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <div class="ms-2"><i class="fa-solid fa-comment"></i></div><span>انتقادات و پیشنهادات خود را با ما در میان بگذارید</span>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="galleryContainer col-12 col-md-6">
                <section>
                    <div class="gallery">
                        @foreach ($GalleryImages as $gal_img)
                            <img src="{{ $gal_img->path == 'seed' ? 'https://picsum.photos/400' : $gal_img->url() }}" alt="{{ $gal_img->id }}">
                        @endforeach
                    </div>
                </section>
            </div>
        </div>

        {{-- SecondPart --}}

        <div class="row">
            <div>

            </div>
            <div class="footerPageLinks">
                <section>
                    <ul class="d-block d-md-inline-block">
                        <li><h1>راههای ارتباطی</h1></li>
                        <li>آدرسها</li>
                        <li>تماس با ما</li>
                        <li>ایمیل های موسسه</li>
                    </ul>
                    <ul class="d-block d-md-inline-block">
                        <li><h1>لینک های مفید</h1></li>
                        <li>KPMG</li>
                        <li>DELOITTE</li>
                        <li>AUDIT INSTITUTE</li>
                    </ul>
                    <ul class="d-block d-md-inline-block">
                        <li><h1>دسترسی سریع</h1></li>
                        <a href="{{ route('industries.index') }}"><li>صنایع</li></a>
                        <a href="{{ route('services.index') }}"><li>خدمات</li></a>
                        <a href="{{ route('articles.index') }}"><li>مقالات</li></a>
                    </ul>
                    <ul class="d-block d-md-inline-block">
                        <li><h1>رسانه</h1></li>
                        <li>رسانه های اجتماعی</li>
                        <li>کانال تلگرام</li>
                        <li>صفحه اینستاگرام</li>
                    </ul>
                </section>

            </div>
        </div>
        <div class="row pb-5 pt-3">
            <p>az inayi ke @ dare</p>
        </div>
    </div>
</div>
<script></script>
