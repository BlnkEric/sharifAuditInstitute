@extends('front.layouts.app')

@section('title', 'خدمات و حوزه فعالیت')

@section('content')
    <div class="container">
        <h1>خدمات</h1>

        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('services.show', $service->slug) }}" class="card-link text-decoration-none text-dark">
                        <div class="card">
                            <img src="{{ $service->image->path == 'seed' ? 'https://picsum.photos/200/300' : $service->image->url() }}"
                                class="card-img-top" alt="{{ $service->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->name }}</h5>
                                <p class="card-text">{{ $service->description }}</p>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
