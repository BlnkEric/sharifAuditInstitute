@extends('layouts.app')

@section('title', 'مدیریت درخواست خدمات')

@section('content')
    <div class="container">
        <div class="row">
            @include('messages')
            <div class="row">
                @include('admin.proposals._table')
            </div>
        </div>
    </div>


@endsection