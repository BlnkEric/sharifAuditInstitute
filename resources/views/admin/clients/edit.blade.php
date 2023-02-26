@extends('admin.layouts.app')

@section('title', 'ویرایش مشتری')

@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('admin.clients.update', $client->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $client->name) }}">
                    <span class="invalid-feedback" role="alert">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="service_id">خدمت مورد نظر برای این مشتری:</label>
                    <select multiple data-live-search="true" name="ser[]" class="form-control @error('service_id') is-invalid @enderror">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                                {{ (collect(old('ser'))->contains($service->id)) ? 'selected':'' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="industry_id">صنعت:</label>
                    <select name="industry_id" id="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        @foreach ($industries as $industry)
                            <option value="{{ $industry->id }}"
                                {{ $industry->id == old('industry_id', $client->industry_id) ? 'selected' : '' }}>
                                {{ $industry->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('industry_id')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">یک لوگو اصلی برای مشتری خود انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror"
                        id="file" value="{{ old('image') }}">
                    
                    @if($client->image)
                            
                        @if ($client->image->path == 'seed')
                            <img src="https://picsum.photos/200/300"
                            style="max-width: 200px;
                            max-height: 200px;">
                        @else
                            <img src="{{ $client->image->url() }}"
                            style="max-width: 200px;
                            max-height: 200px;">
                        @endif

                    @endif
                    
                    <span class="invalid-feedback" role="alert">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning mt-3 mb-2">ویرایش</button>
                </div>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">بازگشت</a>
            </form>
        </div>
    </div>

@endsection
