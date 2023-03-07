@extends('front.layouts.app')
@section('content')

@include('components.slideshow', ['sliderArticles' => $sliderArticles])


<div class="container-fluid articleContainer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <section class="underTheArticle">
                    <div class="overTheArticle">a</div>
                </section>
            </div>
            <div class="col-12 col-md-6 p-0 m-0">
                <div class="row m-0 p-0">
                    <div class="col-6 col-md-12">
                        <section class="underTheArticleV2">
                            <div class="overTheArticle">a</div>
                        </section>
                    </div>
                    <div class="col-6 col-md-12">
                        <section class="underTheArticleV2">
                            <div class="overTheArticle">a</div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid articleSection2 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <section>
                    <div class="articelFilterRowSection2">
                        <span class="float-start">دسته بندی ها</span>
                        <span class="float-end">تازه ها</span>
                        <span class="float-end">اخبار و مقالات</span>
                        <span class="float-end">مقالات پربازدید</span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="bigArticleSection2Item">
                                <section style="background-image: url({{ ($mostRecentArticle->image->path) == 'seed' 
                                    ? "https://picsum.photos/200/300" 
                                    : ($mostRecentArticle->image->url()) }})">
                                </section>
                                <section>
                                    <h1>{{ $mostRecentArticle->name }}</h1>
                                    <p>
                                        <span>{{ $mostRecentArticle->created_at }}</span>
                                        <span class="ms-2 fa fa-clock text-muted"></span>
                                    </p>
                                </section>
                                <section class="mt-3">
                                        {!! Str::limit($mostRecentArticle->description, 200, $end='...') !!}
                                </section>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="indTitle">
                                <div><p>همه مقالات</p></div>
                            </div>
                            <div class="articleSection2AllArticels">
                                @foreach ($NavArticles->random(5) as $article)
                                <section>
                                    <div class="row">
                                        <div class="col-12 col-lg-5 d-none d-lg-block"
                                        style="background-image: url({{ ($article->image->path) == 'seed' 
                                                ? "https://picsum.photos/200" 
                                                : ($article->image->url()) }})"
                                        ></div>
                                        <div class="col-12 col-lg-7">
                                            <h1>
                                                {{ $article->name }}
                                            </h1>
                                            <p>
                                                {!! Str::limit($article->description, 200, $end='...') !!}
                                            </p>
                                            <button class="btn">
                                                <a style="text-decoration: none; color: white;" href="{{ route('articles.show', $article->slug) }}">رفتن به صفحه مربوطه</a>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-3">
                <section class="rightOfArticleSection2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">لورم</h5>
                            <p class="card-text">ایپسومسسسسسسسسسسسسسسسسسسسسسسسسسسسسسس</p>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title">لورم</h5>
                            <p class="card-text">ایپسومسسسسسسسسسسسسسسسسسسسسسسسسسسسسسس</p>
                        </div>
                        <hr>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Cras justo odio</li>
                              <li class="list-group-item">Dapibus ac facilisis in</li>
                              <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                          </div>
                        <hr>
                        <div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary mt-2">Go somewhere</a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title">لورم</h5>
                            <p class="card-text">ایپسومسسسسسسسسسسسسسسسسسسسسسسسسسسسسسس</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection
