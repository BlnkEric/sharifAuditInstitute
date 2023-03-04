@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', 'ساخت خدمت')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label style="margin-bottom: 2px" for="name">عنوان:</label>
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
                    <label for="industry_id">صنعت (اختیاری):</label>
                    <select name="industry_id" id="industry_id" class="form-control">
                        <option value="">انتخاب کنید</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ old('industry_id') == $industry->id ? 'selected' : '' }}>{{ $industry->name }}</option>
                        @endforeach
                    </select>
                    @error('industry_id')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="service_id">خدمت (اختیاری):</label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option value="">انتخاب کنید</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">یک تصویر اصلی برای مقاله خود انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file"
                           value="{{old('image')}}">
                    @error('image')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                   <label for="checkbox">در صورت تمایل برای نمایش مقاله در اسلایدر علامت بزنید</label>
                    <input type="checkbox" name="show_slider" class="switch-input" value="1" {{ old('show_slider') ? 'checked="checked"' : '' }}/>
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
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
    
    <input type="hidden" value="{{ route('upload.article.image.create', ['_token' => csrf_token()]) }}" id="upload_url">
    <script type="module" src="{{ asset('js/ckeditorcdn.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection