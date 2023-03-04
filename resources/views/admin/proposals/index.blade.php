@extends('admin.layouts.app')

@section('title', 'مدیریت درخواست خدمات')

@section('content')
    <div class="container">
        <div class="row py-4 bg-white">
            @include('messages')
            <div class="row">
                @include('admin.proposals._table')
            </div>
        </div>
    </div>


@endsection