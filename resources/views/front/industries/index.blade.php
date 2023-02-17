@extends('front.layouts.app')

@section('content')
    <div class="container">
        <h1>صنایع و مشتریان</h1>

        <div class="row">
            @foreach ($industries as $industry)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $industry->image->path == 'seed' ? 'https://picsum.photos/200/300' : $industry->image->url() }}"
                            class="card-img-top" alt="{{ $industry->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $industry->name }}</h5>
                            <p class="card-text">{{ $industry->description }}</p>
                            <ul>
                                @foreach($industry->proposals as $proposal)
                                    @if($proposal->user)
                                        <li>
                                            {{ $proposal->user->name }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
