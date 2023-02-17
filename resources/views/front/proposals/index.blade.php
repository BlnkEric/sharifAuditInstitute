@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>درخواست های خدمات</h1>

        <div class="row">
            @foreach ($proposals as $proposal)
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
                        @auth
                        {{-- @can('update', $proposal) --}}
                        <div style="display: flex;">
                            <a href=" {{ route('proposals.edit', $proposal->slug) }} " class="btn btn-secondary btn-sm">
                                edit
                            </a>
                            <form action="{{ route('proposals.destroy', $proposal->slug) }}" method="post" class="fm-inline">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit">Delete</button> --}}
                                <input type="submit" value="Delete" class="btn btn-secondary btn-sm">
                            </form>
                        </div>
                        {{-- @endcan --}}
                        @endauth

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
