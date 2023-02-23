@extends('front.layouts.app')

@section('title', 'شرکا، مدیران و حسابداران')

@section('content')
    <div class="container">
        <h1>شرکا، مدیران و حسابداران</h1>
        @foreach($staffCategories as $staffCategory)
            <h2 style="text-align: center; background-color: blue;">{{ $staffCategory->name }}</h2>
            <div class="row">
                @forelse ($staffCategory->staffs as $staff)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('staffs.show', $staff->slug) }}" class="card-link text-decoration-none text-dark">
                            <div class="card">
                                <img src="{{ $staff->image->path == 'seed' ? 'https://picsum.photos/200/300' : $staff->image->url() }}"
                                    class="card-img-top" alt="{{ $staff->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $staff->name }}</h5>
                                    <h5 class="card-title">{{ $staff->role }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="row">
                        <p style="text-align: center;">یافت نشد!</p>
                    </div>
                @endforelse
            </div>
        @endforeach
    </div>
@endsection
