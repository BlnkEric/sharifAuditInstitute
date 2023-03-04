@extends('front.layouts.app')

@include('components.navbar')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <img src="{{ $industry->image->path == 'seed' ? 'https://picsum.photos/800/400' : $industry->image->url() }}"
                class="card-img-top" alt="{{ $industry->name }}">
            <div class="card-body">
                <h1 class="card-title">{{ $industry->name }}</h1>
                <div class="card-text mb-4">{!! $industry->description !!}</div>

                <p class="card-text"><small class="text-muted">{{ $industry->created_at->format('Y-m-d H:i:s') }}</small></p>
            </div>
        </div>
    </div>
@endsection


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