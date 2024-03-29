@extends('admin.layouts.app')

<style>
    .ck-editor__editable {
        min-height: 500px;
        color: black;
    }
</style>

@section('title', "ویرایش $article->name")

@section('content')
    <div class="container">
        <div class="row">
            <form class="bg-dark text-white" action="{{ route('admin.articles.update', $article->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">عنوان:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{$article->name}}">
                    <span class="invalid-feedback" role="alert">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{$article->slug}}">
                    <span class="invalid-feedback" role="alert">
                        @error('slug')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="file">یک تصویر اصلی برای مقاله خود انتخاب کنید:</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file">
                    @if ($article->image->path == 'seed')
                        <img src="https://picsum.photos/200/300">
                    @else
                        <img src="{{ $article->image->url() }}">
                    @endif
                    <span class="invalid-feedback" role="alert">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group" style="margin-top: 100px;">
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
                            @forelse ($article->descriptionImages as $dImage)
                                <tr>
                                    <td class="text-white">
                                        <input type="text" disabled value="{{ $dImage->url() }}" class="form-control">
                                    </td>
                                    <td>
                                        <img style="width: 150px;" src="{{ $dImage->url() }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('delete.service.description.photo', ["id"=>$dImage->id]) }}" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @empty
                               <td class="text-white"> هنوز تصویری برای توضیحات بارگذاری نشده است!  </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea id="editor" name="description" cols="30" rows="10"
                        class="text-dark @error('description') is-invalid @enderror">{{$article->description}}</textarea>
                    <span class="invalid-feedback" role="alert">
                        @error('description')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning mt-3 mb-2">ویرایش</button>
                </div>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">بازگشت</a>
            </form>
        </div>
    </div>
    
    <input type="hidden" value="{{ route('upload.article.image.update', ['_token' => csrf_token(), 'article' => $article->slug]) }}" id="upload_url">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection