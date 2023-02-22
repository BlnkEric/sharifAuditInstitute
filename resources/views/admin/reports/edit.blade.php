@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', "ویرایش $report->name")


@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('admin.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{old('name', $report->name)}}">
                    <span class="invalid-feedback" role="alert">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{old('description', $report->description)}}</textarea>
                    <span class="invalid-feedback" role="alert">
                        @error('description')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="user_id">لیست مشتریان :</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach ($users as $key => $user)
                            <option value="{{ $user->id }}" {{ $user->id == old('user_id', $report->user_id) ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert">
                        @error('user_id')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-warning mt-3 mb-2">Edit</button>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">بازگشت</a>

            </form>



        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>

    {{-- <input type="hidden" value="{{ route('upload.article.image.create', ['_token' => csrf_token()]) }}" id="upload_url"> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script> --}}
    {{-- <script type="module" src="{{ asset('js/ckeditor.js') }}"></script> --}}
@endsection