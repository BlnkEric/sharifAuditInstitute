@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', "ویرایش $jobOffer->name")

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.jobOffers.update', $jobOffer->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{$jobOffer->name}}">
                    @error('name')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{$jobOffer->slug}}">
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
                            <option value="{{ $tag->id }}" 
                                {{ 
                                    (old('tags') == null 
                                            ? collect($jobOffer->tags->pluck('id'))->contains($tag->id) 
                                            : collect(old('tags'))->contains($tag->id))
                                    ? 'selected'
                                    : '' 
                                }}
                            >
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
                    
                    <div class="row">
                        <div class="col-12 col-md 6">
                            <section>
                                <label for="file">یک تصویر اصلی برای موقعیت شغلی انتخاب کنید:</label>
                                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file">
                                @error('image')
                                <span class="invalid-feedback badge bg-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                        </div>
                        <div class="col-12 col-md 6 introTemplateImageContainer">
                            <div>
                                @if($jobOffer->image)
                                    @if ($jobOffer->image->path == 'seed')
                                    <img style=" width: 100%; max-height:100%;" src="https://picsum.photos/200/300">
                                    @else
                                    <img style=" width: 100%; max-height:100%;" src="{{ $jobOffer->image->url() }}">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group" style="margin-top: 100px;">
                    <label for="description_images">عکس های بارگذاری شده:</label>
                    <table  class="table table-striped mt-3 text-white" style="border-color: white;" border="1px;">
                        <thead>
                            <tr>
                                <th>URL (می‌توانید به عنوان URL در ادیتور وارد نمایید.)</th>
                                <th>تصویر</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobOffer->descriptionImages as $dImage)
                                <tr>
                                    <td class="text-white">
                                        <input type="text" disabled value="{{ $dImage->url() }}" class="form-control">
                                    </td>
                                    <td>
                                        <img style="width: 150px;" src="{{ $dImage->url() }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('delete.jobOffer.description.photo', ["id"=>$dImage->id]) }}" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @empty
                               <td class="text-white"> هنوز تصویری برای توضیحات بارگذاری نشده است!  </td>
                            @endforelse
                        </tbody>
                    </table>
                </div> --}}
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{$jobOffer->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-2">
                    <button type="submit" class="btn btn-warning">ویرایش</button>
                    <a href="{{ route('admin.jobOffers.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
    
    {{-- <input type="hidden" value="{{ route('upload.jobOffer.image.update', ['_token' => csrf_token(), 'jobOffer' => $jobOffer->slug]) }}" id="upload_url"> --}}
    <script type="module" src="{{ asset('js/ckeditorcdn.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection