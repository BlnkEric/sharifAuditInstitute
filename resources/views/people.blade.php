@extends('front.layouts.app')


@include('components.navbar')

<div class="container-fluid peopleContainer">
    <div class="container">
        <div class="row">
            <h2>Salam</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <section>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{asset('/images/RandomImage.jpg')}}" alt="Avatar">
                            </div>
                            <div class="flip-card-back">
                                <h1>John Doe</h1>
                                <p>Architect & Engineer</p>
                                <p>We love that guy</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-4">
                <section>ad</section>
            </div>
            <div class="col-12 col-md-4">
                <section>awd</section>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
