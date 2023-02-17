@extends('layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', 'ایجاد درخواست خدمت')

@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('proposals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- {{ Form::hidden('user_id', {{ Auth::user()->name }}, array('id' => 'user_id')) }} --}}
                <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
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
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('slug')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="company_name">نام شرکت:</label>
                    <input type="text" id="company_name" name="company_name"
                           class="form-control @error('company_name') is-invalid @enderror" value="{{old('company_name')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('company_name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="text" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    <span class="invalid-feedback" role="alert">
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>

                <br style="clear: left;" />

                <div style="width: 500px;">
                    <div style="float: left; width: 200px;">                            
                        <select name="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
                            <option value="null">انتخاب کنید</option>
                            @foreach ($industries as $key => $industry)
                                <option value="{{ $industry->id }}"
                                @if ($industry->id == old('industry_id'))
                                    selected="selected"
                                @endif
                                >{{ $industry->name }}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert">
                            @error('industry_id')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </span>
                    </div>
                    <div style="float: left; width: 100px;">
                        <select name="service_id" class="form-control @error('service_id') is-invalid @enderror">
                            <option value="null">انتخاب کنید</option>
                            @foreach ($services as $key => $service)
                                <option value="{{ $service->id }}"
                                @if ($service->id == old('service_id'))
                                    selected="selected"
                                @endif
                                >{{ $service->name }}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert">
                            @error('service_id')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </span>
                    </div>
                    <div style="float: left; width: 200px;">
                    
                            <input type="file" class="form-control"
                                id="file_path" name="file_path"
                                accept="image/png, image/jpeg">
                            
                    </div>
                    <br style="clear: left;" />
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
                <a href="{{ route('proposals.index') }}" class="btn btn-secondary">بازگشت</a>
            </form>
        </div>
    </div>

    {{-- <input type="hidden" value="{{ route('upload.service.image.create', ['_token' => csrf_token()]) }}" id="upload_url"> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection