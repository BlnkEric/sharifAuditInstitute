@extends('front.layouts.app')
@section('content')

<div class="container mt-5">
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

{{-- <div class="marquee">
    <p style="background-image:url('https://picsum.photos/200'); border-radius: 50%; max-width: 100%; max-height: 100%;">
    </p>
</div> --}}


<div class="logoSlider">
    <div class="logo-slide-track" id="logoSlideTrack">
        
        <div class="slide">مشتریان</div>
        <div class="slide">این صنعت</div>
        @foreach ($industry->clients as $client)
            @if($client->image)
                @if ($client->image->path == 'seed')
                    <div class="logoSlide" style="background-image:url('https://picsum.photos/200');"></div>
                @else
                    <div class="logoSlide" style="background-image:url({{ $client->image->url() }});"></div>
                @endif
            @endif
        @endforeach
        <div class="logoSlide" style="background-image:url('https://picsum.photos/200');"></div>
        <div class="logoSlide" style="background-image:url('https://picsum.photos/200');"></div>
        <div class="logoSlide" style="background-image:url('https://picsum.photos/200');"></div>
        <div class="slide">مشتریان</div>
        <div class="slide">این صنعت</div>
        {{-- <div>مشتریانی که در این صنعت خدمات دریافت میکنند</div>
        <div>مشتریانی که در این صنعت خدمات دریافت میکنند</div> --}}
    </div>
</div>

@include('components.footer')
@endsection

