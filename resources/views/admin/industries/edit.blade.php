@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', "ویرایش $industry->name")

@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('admin.industries.update', $industry->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{$industry->name}}">
                    <span class="invalid-feedback" role="alert">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{$industry->slug}}">
                    <span class="invalid-feedback" role="alert">
                        @error('slug')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="file">یک تصویر برای صنعت خود انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file">
                    {{-- {{$industry->image}} --}}
                    @if ($industry->image->path == 'seed')
                        <img src="https://picsum.photos/200/300">
                    @else
                        <img src="{{ $industry->image->url() }}">
                    @endif
                    <span class="invalid-feedback" role="alert">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{$industry->description}}</textarea>
                    <span class="invalid-feedback" role="alert">
                        @error('description')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3 mb-2">ایجاد</button>
                </div>
                <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">بازگشت</a>
            </form>
        </div>
    </div>
    
    {{-- <input type="hidden" value="{{ route('upload.article.image.create', ['_token' => csrf_token()]) }}" id="upload_url"> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script> --}}
    {{-- <script type="module" src="{{ asset('js/ckeditor.js') }}"></script> --}}
@endsection