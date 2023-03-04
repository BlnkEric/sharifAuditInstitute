@extends('front.layouts.app')


@include('components.navbar')

<div class="container-fluid peopleContainer">
    <div class="container">
        @foreach ($staffCategories as $stf_cat)
        <div class="row">
            <h2>{{ $stf_cat->name }}</h2>
        </div>
        <div class="row">
            @foreach ($stf_cat->staffs as $staff)
            <div class="col-12 col-md-4">
                <section>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <h3>{{ $staff->name }}</h3>
                            <div class="flip-card-front">
                                @if ($staff->image->path == 'seed')
                                    <img src="https://picsum.photos/200/300" alt="Avatar">
                                @else
                                    <img src="{{ $staff->image->url() }}" alt="Avatar">
                                @endif
                            </div>
                            <div class="flip-card-back">
                                <h1>{{ $staff->name }}</h1>
                                <p>{{ $staff->role }}</p>
                                <p>{{ $staff->email }}</p>
                                <a href="{{ route('staffs.show', $staff->slug) }}">
                                    صفحه شخصی
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endforeach
        </div>
        @endforeach

    </div>
</div>

@include('components.footer')
