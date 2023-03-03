@extends('front.layouts.app')


@include('components.navbar', ['services' => $services])
@include('components.sliderLoop')


<div class="container-fluid workWithUsHomeContainer">
    <div class="container">
        <div class="row"></div>
        <section>
            <h3>ارش خیلی دوست خوبی است</h3>
            <h1>ارش خیلی دوست خوبی است</h1>
        </section>

        <div class="row">
            <div class="col-6 col-md-3">
                <section>
                    a
                </section>
            </div>
            <div class="col-6 col-md-3">
                <section>
                    a
                </section>
            </div>
            <div class="col-6 col-md-3">
                <section>
                    a
                </section>
            </div>
            <div class="col-6 col-md-3">
                <section>
                    a
                </section>
            </div>
        </div>
    </div>
</div>


@include('components.faq')
<br>

<br>
@include('components.footer')
