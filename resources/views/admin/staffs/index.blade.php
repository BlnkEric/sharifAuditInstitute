@extends('admin.layouts.app')

@section('title', 'مدیریت کارمندان')

@section('content')
    <div class="container">
        <div class="row">
            @include('messages')
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-primary w-50" href="{{ route('admin.staffs.create') }}">ایجاد کارمند جدید</a>
                </div>
                @include('admin.staffs._table')
            </div>
        </div>
    </div>


@endsection
