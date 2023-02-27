@extends('front.layouts.app')

@include('components.navbar')

<div class="container-fluid mainIntroContactUs">
    <div class="container">
        <div class="row">
            <section>
                <h1 class="mb-2 mt-5">Arash</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, tenetur?</p>
            </section>
            <div id="mainIntroContactUsClippath"></div>
        </div>
    </div>
</div>

<div class="container-fluid contactContainer">
    <div class="container">
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
                <h3>خونه ارش بابل جون</h3>
                <div>
                    <h4>ARASHTItle</h4>
                    <p class="mt-2">ArashLorem Lorem, ipsum dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div>
                    <section class="contactUsRowIconContainer">
                        <i class="fa-solid fa-phone"></i>
                    </section>
                </div>
                <h3>خونه ارش بابل جون</h3>
                <div>
                    <h4>ARASHTItle</h4>
                    <p class="mt-2">ArashLorem Lorem, ipsum dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div>
                    <section class="contactUsRowIconContainer">
                        <i class="fa-solid fa-message"></i>
                    </section>
                </div>
                <h3>خونه ارش بابل جون</h3>
                <div>
                    <h4>ARASHTItle</h4>
                    <p class="mt-2">ArashLorem Lorem, ipsum dolor.</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Form --}}
<div class="container-fluid contactUsFormContainer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <section>
                    <h1>سلام اسمت چيه؟ ارش هستم به نام خدا</h1>
                    <p>امروز روز خوبي بود.خب خشتع شدم بقيش لورم . lore,20
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate illum quisquam odio sapiente tenetur iusto ex atque animi eligendi quia!
                        lorem bishtar mikhamm. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam autem aliquid, ipsum beatae suscipit nobis aut incidunt enim facere eum assumenda sequi rem odio illo vitae earum commodi est delectus.
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
