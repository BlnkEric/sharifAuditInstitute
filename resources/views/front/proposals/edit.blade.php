@extends('front.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', "ویرایش $proposal->name")


@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('proposals.update', $proposal->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{old('name', $proposal->name)}}">
                    <span class="invalid-feedback" role="alert">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{old('slug', $proposal->slug)}}">
                    <span class="invalid-feedback" role="alert">
                        @error('slug')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="company_name">نام شرکت:</label>
                    <input type="text" id="company_name" name="company_name"
                           class="form-control @error('company_name') is-invalid @enderror" value="{{old('company_name', $proposal->company_name)}}">
                    <span class="invalid-feedback" role="alert">
                        @error('company_name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="text" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror" value="{{old('email', $proposal->email)}}">
                    <span class="invalid-feedback" role="alert">
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="industry_id">صنعت:</label>
                    <select name="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach ($industries as $key => $industry)
                            <option value="{{ $industry->id }}" {{ old('industry_id', $proposal->industry_id) == $industry->id ? 'selected' : '' }}>
                                {{ $industry->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert">
                        @error('industry_id')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="industry_id">خدمت مورد درخواست:</label>
                    <select name="service_id" class="form-control @error('service_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach ($services as $key => $service)
                            <option value="{{ $service->id }}" {{ old('service_id', $proposal->service_id) == $service->id  ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert">
                        @error('service_id')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea  name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{old('description', $proposal->description)}}</textarea>
                    <span class="invalid-feedback" role="alert">
                        @error('description')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3 mb-2">ویرایش</button>
                </div>
                <a href="{{ route('proposals.index') }}" class="btn btn-secondary">بازگشت</a>
            </form>
        </div>
    </div>

@endsection