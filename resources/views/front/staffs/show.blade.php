@extends('front.layouts.app')
@section('content')

<div class="container">
    {{-- <div class="card mb-3">
        <img src="{{ $staff->image->path == 'seed' ? 'https://picsum.photos/800/400' : $staff->image->url() }}"
            class="card-img-top" alt="{{ $staff->name }}">
        <div class="card-body">
            <h1 class="card-title">{{ $staff->name }}</h1>
            <h3 class="">{{ $staff->role }}</h3>
            <div class="card-text mb-4">{!! $staff->description !!}</div>
            <p>{{ $staff->email }}</p>
        </div>
    </div> --}}
    <hr />
    <div class="card" style="width: 100%;">
        <div class="row no-gutters">
            <div class="col-sm-5">
                <img src="{{ $staff->image->path == 'seed' ? 'https://picsum.photos/800/400' : $staff->image->url() }}"
                class="card-img-top" alt="{{ $staff->name }}">
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">{{ $staff->name }}</h5>
                    <h3 class="card-title">{{ $staff->role }}</h3>
                    <p class="card-text">
                        {{ $staff->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr />
</div>

@include('components.footer')
@endsection
