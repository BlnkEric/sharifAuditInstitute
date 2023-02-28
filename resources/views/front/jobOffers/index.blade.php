@extends('front.layouts.app')

@section('title','موقعیت های شغلی')
@section('content')
    <div class="container">
        <h1>موقعیت های شغلی</h1>

        <div class="row">
            @foreach ($jobOffers as $jobOffer)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('jobOffers.show', $jobOffer->slug) }}" class="card-link text-decoration-none text-dark">
                        <div class="card">
                            <img src="{{ $jobOffer->image->path == 'seed' ? 'https://picsum.photos/200/300' : $jobOffer->image->url() }}"
                                class="card-img-top" alt="{{ $jobOffer->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jobOffer->name }}</h5>
                                <p class="card-text">{{ $jobOffer->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
