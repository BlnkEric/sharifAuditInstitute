@extends('admin.layouts.app')

@section('title', 'مدیریت خدمات')

@section('content')
    <div class="container">
        <div class="row py-4 bg-white">
            @include('messages')
            <div class="row">                
                <div class="col-md-4">
            <a href="{{ route('admin.specialServices.create', $service->slug) }}" class="btn btn-primary w-50">افزودن خدمات خاص</a>
            </div>
                @include('admin.specialServices._table')
            </div>
        </div>
    </div>


@endsection
