@extends('front.layouts.app')
@section('content')
<div class="container-fluid peopleContainer">
    <div class="container mt-5">
        <div class="card mb-3">
            <img src="{{ $service->image->path == 'seed' ? 'https://picsum.photos/800/400' : $service->image->url() }}"
                class="card-img-top" alt="{{ $service->name }}">
            <div class="card-body">
                <h1 class="card-title">{{ $service->name }}</h1>
                <div class="card-text mb-4">{!! $service->description !!}</div>

                <p class="card-text"><small class="text-muted">{{ $service->created_at->format('Y-m-d H:i:s') }}</small></p>
            </div>
        </div>
        <div class="row">
            <h2>خدمات خاص</h2>
        </div>
        <div style="display: flex;  flex-wrap: wrap;">
            @foreach ($service->specialServices as $key => $sp_ser)
                <div class="flip-card" style="flex: 0 0 50%; padding: 15px; margin-bottom: 15px;">
                    <div class="flip-card-inner">
                        <h3 style="background-color: rgb(43, 43, 43); color:white; padding: 10px">{{ $sp_ser->name }}</h3>
                        <div class="flip-card-front">
                            @if ($sp_ser->image->path == 'seed')
                                <img src="https://picsum.photos/200/300" alt="Avatar">
                            @else
                                <img src="{{ $sp_ser->image->url() }}" alt="Avatar">
                            @endif
                        </div>
                        <div class="flip-card-back">
                            <a href="{{ route('specialServices.show', $sp_ser->slug) }}">
                                صفحه مخصوص مربوط به این خدمت
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('components.footer')
@endsection
