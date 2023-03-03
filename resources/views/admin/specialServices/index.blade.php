@extends('admin.layouts.app')

@section('title', 'مدیریت خدمات')

@section('content')
    <div class="container">
        <div class="row py-4 bg-white">
            @include('messages')
            <div class="row">
                @include('admin.specialServices._table')
            </div>
        </div>
    </div>


@endsection
