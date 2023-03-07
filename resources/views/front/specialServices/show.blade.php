@extends('front.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <img src="{{ $specialService->image->path == 'seed' ? 'https://picsum.photos/800/400' : $specialService->image->url() }}"
            class="card-img-top" alt="{{ $specialService->name }}">
        <div class="card-body">
            <h1 class="card-title">{{ $specialService->name }}</h1>
            <div class="card-text mb-4">{!! $specialService->description !!}</div>

            <p class="card-text"><small class="text-muted">{{ $specialService->created_at->format('Y-m-d H:i:s') }}</small></p>
        </div>
    </div>
</div>
@include('components.footer')
@endsection
