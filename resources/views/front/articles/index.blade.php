@extends('front.layouts.app')

@section('title', 'مقالات')

@section('content')
    <div class="container">
        <h1>مقالات</h1>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('articles.show', $article->slug) }}" class="card-link text-decoration-none text-dark">
                        <div class="card">
                            <img src="{{ $article->image->path == 'seed' ? 'https://picsum.photos/200/300' : $article->image->path }}"
                                class="card-img-top" alt="{{ $article->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ Str::limit($article->description, 20, $end='...') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
