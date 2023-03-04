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
            <form action="{{ route('admin.articles.update', $article->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">عنوان:</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror" value="{{$article->name}}">
                    @error('name')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control @error('slug') is-invalid @enderror" value="{{$article->slug}}">
                    @error('slug')
                    <span class="invalid-feedback badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">

                    <div class="row">
                        <div class="col-12 col-md 6">
                            <section>
                                <label for="file">یک تصویر اصلی برای مقاله خود انتخاب کنید:</label>
                                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="file">
                                <label for="checkbox">
                                    در صورت تمایل برای نمایش مقاله در اسلایدر علامت بزنید
                                </label>
                                <input type="hidden" name="show_slider" class="switch-input" value="0"/>
                                <input type="checkbox" name="show_slider" class="switch-input" value="1" {{ old('show_slider', $article->show_slider) ? 'checked="checked"' : '' }}/>
                                     
                                
                                @error('image')
                                <span class="invalid-feedback badge bg-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                        </div>
                        <div class="col-12 col-md 6 introTemplateImageContainer">
                            <div>
            
                                @if ($article->image->path == 'seed')
                                    <img style=" width: 100%; max-height:100%" src="https://picsum.photos/200/300">
                                @else
                                    <img style=" width: 100%; max-height:100%" src="{{ $article->image->url() }}">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group" style="margin-top: 100px;">
                    <label for="description_images">عکس های بارگذاری شده:</label>
                    <table  class="table table-striped mt-3 text-white" style="border-color: white;" border="2px;">
                        <thead>
                            <tr>
                                <th>URL (می‌توانید به عنوان URL در ادیتور وارد نمایید.)</th>
                                <th>تصویر</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:rgb(56, 56, 56)">
                            @forelse ($article->descriptionImages as $dImage)
                                <tr>
                                    <td style="display: flex" class="text-white">
                                        <input type="text" disabled value="{{ $dImage->url() }}" class="form-control">
                                        <button href="{{ route('delete.service.description.photo', ["id"=>$dImage->id]) }}" class="btn btn-danger">Delete</button>
                                    </td>
                                    <td>
                                        <img style="width: 150px;" src="{{ $dImage->url() }}" alt="">
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
                    @error('description')
                    <span class="invalid-feedback  badge bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-2">
                    <button type="submit" class="btn btn-warning">ویرایش</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
    
    <input type="hidden" value="{{ route('upload.article.image.update', ['_token' => csrf_token(), 'article' => $article->slug]) }}" id="upload_url">
    <script type="module" src="{{ asset('js/ckeditorcdn.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor.js') }}"></script>


@endsection