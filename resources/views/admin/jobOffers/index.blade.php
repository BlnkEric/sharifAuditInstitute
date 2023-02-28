@extends('admin.layouts.app')

@section('title', 'مدیریت موقعیت های شغلی')

@section('content')
    <div class="container">
        <div class="row">
            @include('messages')
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-primary w-50" href="{{ route('admin.jobOffers.create') }}">ایجاد موقعیت شغلی جدید</a>
                </div>
                @include('admin.jobOffers._table')
            </div>
        </div>
    </div>
@endsection
