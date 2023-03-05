@extends('front.layouts.app')

@include('components.navbar')

<div class="container mt-5">
    <div class="card mb-3">
        <img src="{{ $service->image->path == 'seed' ? 'https://picsum.photos/800/400' : $service->image->url() }}"
            class="card-img-top" alt="{{ $service->name }}">
        <div class="card-body">
            <h1 class="card-title">{{ $service->name }}</h1>
            <div class="card-text mb-4">{!! $service->description !!}</div>
            <div class="flex">
                @foreach($service->specialServices as $key => $sp_ser)
                    <div>
                        {{ $sp_ser->name }}
                    </div>
                @endforeach
            </div>
            <p class="card-text"><small class="text-muted">{{ $service->created_at->format('Y-m-d H:i:s') }}</small></p>
        </div>
    </div>
</div>

