@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', 'ساخت گزارش')

@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                    <span class="invalid-feedback" role="alert">
                        @error('description')
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
                    <button type="submit" class="btn btn-primary mt-3 mb-2">Create</button>
                </div>
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