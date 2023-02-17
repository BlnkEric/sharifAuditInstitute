@extends('front.layouts.app')

@section('title', $service->name)

@section('content')
    <style>
        .card-img-top {
            height: 400px;
            object-fit: cover;
        }

        .card-text {
            line-height: 1.8;
        }

        .card-title {
            font-weight: bold;
            font-size: 2rem;
        }

        .container {
            max-width: 800px;
        }
    </style>
    <div class="container">
        <div class="card mb-3">
            <img src="{{ $service->image->path == 'seed' ? 'https://picsum.photos/800/400' : $service->image->path }}"
                class="card-img-top" alt="{{ $service->name }}">
            <div class="card-body">
                <h1 class="card-title">{{ $service->name }}</h1>
                <div class="card-text mb-4">{!! $service->description !!}</div>
                <p class="card-text"><small class="text-muted">{{ $service->created_at->format('Y-m-d H:i:s') }}</small></p>
            </div>
        </div>
    </div>
@endsection
