@extends('admin.layouts.app')

@section('title', 'مدیریت مشتریان')

@section('content')
    <div class="container">
        <div class="row py-4 bg-white">
            @include('messages')
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-primary w-50" href="{{ route('admin.clients.create') }}">ایجاد مشتری جدید</a>
                </div>
                @include('admin.clients._table')
            </div>
        </div>
    </div>
@endsection
