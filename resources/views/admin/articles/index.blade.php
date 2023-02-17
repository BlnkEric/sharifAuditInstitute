@extends('admin.layouts.app')

@section('title', 'مدیریت مقالات')

@section('content')
    <div class="container">
        <div class="row">
            @include('messages')
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-primary w-50" href="{{ route('admin.articles.create') }}">ایجاد مقاله جدید</a>
                </div>
                @include('admin.articles._table')
            </div>
        </div>
    </div>


@endsection
