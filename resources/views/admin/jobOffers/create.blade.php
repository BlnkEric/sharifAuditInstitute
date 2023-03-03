@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', 'ساخت موقعیت شغلی')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.jobOffers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}">
                    @error('slug')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag_id">دسته بندی های مورد نظر برای این موقعیت شغلی:</label>
                    <select multiple data-live-search="true" name="tags[]" class="form-control @error('tags') is-invalid @enderror">
                        @foreach ($tags as $key => $tag)
                            <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">یک تصویر اصلی برای این موقعیت شغلی انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file"
                           value="{{old('image')}}">
                    @error('image')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                    @error('description')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-2">
                    <button type="submit" class="btn btn-primary">ایجاد</button>
                    <a href="{{ route('admin.jobOffers.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
    
    <input type="hidden" value="{{ route('upload.service.image.create', ['_token' => csrf_token()]) }}" id="upload_url">
    {{--     <script type="module" src="{{ asset('js/ckeditor.js') }}"></script> --}}
    <script type="module" src="{{ asset('js/ckeditorcdn.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection