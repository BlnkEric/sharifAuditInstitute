@extends('front.layouts.app')

@section('title', $staff->name)

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
            <img src="{{ $staff->image->path == 'seed' ? 'https://picsum.photos/800/400' : $staff->image->url() }}"
                class="card-img-top" alt="{{ $staff->name }}">
            <div class="card-body">
                <h1 class="card-title">{{ $staff->name }}</h1>
                <h3 class="">{{ $staff->role }}</h3>
                <div class="card-text mb-4">{!! $staff->description !!}</div>
                <p>{{ $staff->email }}</p>
            </div>
        </div>
    </div>
@endsection
