@extends('front.layouts.app')

@section('content')
    <div class="container">
        <h1>درخواست تکی خدمات</h1>

        <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">{{ $proposal->name }}</h5>
                            <p class="card-text">{{ $proposal->description }}</p>
                            <ul>
                                <li>
                                    industry: {{ $proposal->industry->name }}
                                </li>
                                <li>
                                    service: {{ $proposal->service->name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
