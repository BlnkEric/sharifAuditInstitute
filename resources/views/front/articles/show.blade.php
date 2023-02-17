@extends('front.layouts.app')

@section('title', $article->name)

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
            <img src="{{ $article->image->path == 'seed' ? 'https://picsum.photos/800/400' : $article->image->url() }}"
                class="card-img-top" alt="{{ $article->name }}">
            <div class="card-body">
                <h1 class="card-title">{{ $article->name }}</h1>
                <div class="card-text mb-4">{!! $article->description !!}</div>
                <p class="card-text"><small class="text-muted">{{ $article->created_at->format('Y-m-d H:i:s') }}</small></p>
            </div>
        </div>
    </div>
@endsection
