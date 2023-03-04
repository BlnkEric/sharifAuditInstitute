@extends('admin.layouts.app')

@section('title', 'ویرایش مشتری')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $client->name) }}">
                    @error('name')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="service_id">خدمت مورد نظر برای این مشتری:</label>
                    <select multiple data-live-search="true" name="services[]" class="form-control @error('services') is-invalid @enderror">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                                {{ 
                                    (old('services') == null 
                                            ? collect($client->services->pluck('id'))->contains($service->id) 
                                            : collect(old('services'))->contains($service->id))
                                    ? 'selected'
                                    : '' 
                                }}
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
                    <select name="industry_id" id="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
                        <option value="" disabled>انتخاب کنید</option>
                        @foreach ($industries as $industry)
                            <option value="{{ $industry->id }}"
                                {{ $industry->id == old('industry_id', $client->industry_id) ? 'selected' : '' }}>
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
                                <label for="file">یک لوگو اصلی برای مشتری خود انتخاب کنید:</label>
                                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror"
                                    id="file" value="{{ old('image') }}">
                                @error('image')
                                <span class="invalid-feedback badge bg-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                        </div>
                        <div class="col-12 col-md 6 introTemplateImageContainer">
                            <div>
                                @if($client->image)
                                    @if ($client->image->path == 'seed')
                                        <img src="https://picsum.photos/200/300"
                                        style=" width: 100%; max-height:100%;">
                                    @else
                                        <img src="{{ $client->image->url() }}"
                                        style=" width: 100%; max-height:100%;">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3 mb-2">
                    <button type="submit" class="btn btn-warning">ویرایش</button>
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>

@endsection
