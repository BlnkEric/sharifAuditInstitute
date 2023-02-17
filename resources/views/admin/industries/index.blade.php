@extends('layouts.app')

@section('title', 'مدیریت صنایع')

@section('content')
    <div class="container">
        <div class="row">
            @include('messages')
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-primary w-50" href="{{ route('admin.industries.create') }}">ایجاد صنعت جدید</a>
                </div>
                <div class="col-md-8">
                    <form>
                        <div>
                            <div class="row">
                                <div class="col-md-8">
                                    <input class="form-control" type="search" name="search"
                                        placeholder="Search in industries">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-secondary">
                                        Find
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @include('admin.industries._table')
            </div>
        </div>
    </div>


@endsection
