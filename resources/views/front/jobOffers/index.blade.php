@extends('front.layouts.app')

@include('components.navbar')

<div class="container">
    <div class="row">
        @foreach ($jobOffers as $jobOffer)
            <a style="margin-bottom: 15px" href="{{ route('jobOffers.show', $jobOffer->slug) }}" class="card-link text-decoration-none text-dark">
                <div class="card" style="width: 100%;">
                    <div class="row no-gutters">
                        
                        <div class="col-sm-5">
                            <img src="{{ $jobOffer->image->path == 'seed' ? 'https://picsum.photos/800/400' : $jobOffer->image->url() }}"
                            class="card-img-top" alt="{{ $jobOffer->name }}">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jobOffer->name }}</h5>
                                <h3 class="card-title">{{ $jobOffer->role }}</h3>
                                <p class="card-text">
                                    {{ $jobOffer->description }}
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </a>
            <hr/>
        @endforeach
    </div>
</div>


@include('components.footer')