@extends('front.layouts.app')

{{-- @section('title', $jobOffer->name) --}}

@include('components.navbar')

<div class="container-fluid mt-5">
    @include('messages')

    <div class="card mb-3">
        <img src="{{ $jobOffer->image->path == 'seed' ? 'https://picsum.photos/800/400' : $jobOffer->image->url() }}"
            class="card-img-top" alt="{{ $jobOffer->name }}">
        <div class="card-body">
            <h1 class="card-title">{{ $jobOffer->name }}</h1>
            <p>
                @foreach ($jobOffer->tags as $tag)
                    <span href="#" class="badge bg-dark badge-lg">{{ $tag->name }}</span>
                @endforeach
            </p>
            <div class="card-text m-5">{!! $jobOffer->description !!}</div>

            <p class="card-text"><small class="text-muted">{{ $jobOffer->created_at->format('Y-m-d H:i:s') }}</small></p>
        </div>
        <a href="{{ route('resumeForm.download') }}" class="badge bg-dark badge-lg text-decoration-none" style="padding: 10px; font-size: larger;">دانلود قالب رزومه مورد تایید موسسه</a>
    
        <form action="{{ route('jobRequests.store', $jobOffer->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div style="display: flex">
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                    <button type="submit" class="btn btn-dark" style="width:30%">ارسال رزومه</button>
                </div>
            </div>
            @error('file')
            <span class="invalid-feedback badge bg-danger badge-lg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </form>
    </div>
</div>

@include('components.footer')
