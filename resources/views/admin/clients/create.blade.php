@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    },
    span.select2.select2-container.select2-container--classic{
        width: 100% !important;
    }
</style>


@section('title', 'ایجاد مشتری')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="service_id">خدمت مورد نظر برای این مشتری:</label>
                    <select multiple data-live-search="true" name="services[]" class="form-control @error('services') is-invalid @enderror">
                        @foreach ($services as $key => $service)
                            <option value="{{ $service->id }}" {{ (collect(old('services'))->contains($service->id)) ? 'selected':'' }}

                            >
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('services')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="industry_id">صنعت:</label>
                    <select name="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach ($industries as $key => $industry)
                            <option value="{{ $industry->id }}" {{ old('industry_id') == $industry->id ? 'selected' : '' }}>
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
                    <label for="file">یک لوگو اصلی برای مشتری خود انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file"
                           value="{{old('image')}}">
                    @error('image')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group mt-3 mb-2">
                    <button type="submit" class="btn btn-primary">ایجاد</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
    

    <script>
        $(document).ready(function(){
            $('.js-example-basic-single').select2({
                theme: "classic"
            });
        });
    </script>
@endsection