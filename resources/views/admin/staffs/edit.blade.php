@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', 'ویرایش کارمند')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.staffs.update', $staff->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $staff->name) }}">
                    @error('name')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">(اختیاری) Slug:</label>
                    <input type="text" id="slug" name="slug"
                        class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $staff->slug) }}">
                    @error('slug')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">سمت کارمند:</label>
                    <input type="text" id="role" name="role"
                        class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $staff->role) }}">
                    @error('role')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">شماره تماس:</label>
                    <input type="text" id="phone" name="phone"
                           class="form-control @error('phone') is-invalid @enderror" value="{{old('phone', $staff->phone)}}">
                    @error('phone')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">ایمیل:</label>
                    <input type="text" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror" value="{{old('email', $staff->email)}}">
                    @error('email')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="staff_category_id">دسته‌بندی:</label>
                    <select name="staff_category_id" id="staff_category_id" class="form-control @error('staff_category_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach($staffCategories as $staffCategory)
                            <option value="{{ $staffCategory->id }}" {{ old('staff_category_id', $staff->staffCategory->id) == $staffCategory->id ? 'selected' : '' }}>{{ $staffCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('staff_category_id')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="industry_id">صنعت (اختیاری):</label>
                    <select name="industry_id" id="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach ($industries as $industry)
                            <option value="{{ $industry->id }}"
                                {{ $staff->industry ? ($staff->industry->id == $industry->id ? 'selected' : '') : '' }}>
                                {{ $industry->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('industry_id')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">

                    
                    <div class="row">
                        <div class="col-12 col-md 6">
                            <section>
                                <label for="file">یک تصویر اصلی برای کارمند خود انتخاب کنید:</label>
                                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror"
                                    id="file">
                                @error('image')
                                <span class="invalid-feedback badge bg-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                        </div>
                        <div class="col-12 col-md 6 introTemplateImageContainer">
                            <div>
                                @if ($staff->image->path == 'seed')
                                    <img style=" width: 100%; max-height:100%;" src="https://picsum.photos/200/300">
                                @else
                                    <img style=" width: 100%; max-height:100%;" src="{{ $staff->image->url() }}">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{ old('description', $staff->description) }}</textarea>
                    @error('description')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-2">
                    <button type="submit" class="btn btn-warning">ویرایش</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>

    {{-- <input type="hidden" value="{{ route('upload.service.image.create', ['_token' => csrf_token()]) }}" id="upload_url"> --}}
    <script type="module" src="{{ asset('js/ckeditorcdn.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection
