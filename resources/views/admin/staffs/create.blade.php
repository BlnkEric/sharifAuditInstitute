@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', 'ایجاد کارمند')

@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('admin.staffs.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="slug">(اختیاری) Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('slug')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="role">سمت کارمند:</label>
                    <input type="text" id="role" name="role"
                           class="form-control @error('role') is-invalid @enderror" value="{{old('role')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('role')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="phone">شماره تماس:</label>
                    <input type="text" id="phone" name="phone"
                           class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('phone')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل:</label>
                    <input type="text" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="staff_category_id">دسته‌بندی:</label>
                    <select name="staff_category_id" id="staff_category_id" class="form-control @error('staff_category_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach($staffCategories as $staffCategory)
                            <option value="{{ $staffCategory->id }}" {{ old('staff_category_id') == $staffCategory->id ? 'selected' : '' }}>{{ $staffCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('staff_category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
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
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">یک تصویر اصلی برای کارمند خود انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file"
                           value="{{old('image')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('image')
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3 mb-2">ایجاد</button>
                </div>
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">بازگشت</a>
            </form>
        </div>
    </div>
    
    {{-- <input type="hidden" value="{{ route('upload.service.image.create', ['_token' => csrf_token()]) }}" id="upload_url"> --}}
    <script type="module" src="{{ asset('js/ckeditorcdn.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection