@extends('front.layouts.app')


{{-- @include('components.navbar', ['services' => $services]) --}}
@include('components.navbar')


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
<div class="container-fluid introTemplate">
    <div class="container">
        <div class="row p-3">
            <div class="col-12 col-md 6">
                <section>
                    <h2>Arash Salan miresone</h2>
                    <h5 class="mt-4 mb-4">Arash Lorem ipsum Lorem ipsum dolor sit amet. corrupti. Temporibus nihil
                        molestiae ipsum aliquid alias totam facere.
                        Temporibus nihil
                        molestiae ipsum aliquid alias totam facere.
                        Temporibus nihil
                        molestiae ipsum aliquid alias totam facere.
                    </h5>
                    <button>SALAM</button>
                    <div>
                        <div class="m-2">😘<div>Arash</div>
                        </div>
                        <div>
                            <div>😘</div>Seifi
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md 6 introTemplateImageContainer">
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('components.sliderLoop')

@include('components.faq')
<br>

<br>
@include('components.footer')
