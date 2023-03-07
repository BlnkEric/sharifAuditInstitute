@extends('front.layouts.app')

@section('content')

@include('components.sliderLoop')

<div class="container-fluid workWithUsHomeContainer">
    <div class="container">
        <div class="row">
            <section>
                <h3>تیتر اصلی</h3>
                <h1>تیتر اصلی یا مهم ترین مطلب دلخواه</h1>
            </section> 
        </div>
        <div class="header">
                <h2>خدمات اصلی موسسه حقوقی شریف</h2>
        </div>
        <div class="row">
            @foreach ($NavServices as $service)
                
            <div class="col-6">
                <a href="{{ route('services.show', $service->slug) }}">
                    <section style="background-image: url({{ ($service->image->path) == 'seed' 
                        ? "https://picsum.photos/200/300" 
                        : ($service->image->url()) }})">

                            {!! Str::limit($service->name, 30, $end='...') !!}
                    </section>
                </a>
                <div>
                    {!! Str::limit($service->description, 200, $end='...') !!}
                </div>
            </div>
            
            @endforeach
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
                        <span class="float-end">صنایع پربازدید</span>
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
                                <div><p>صنایع</p></div>
                            </div>
                            <div class="articleSection2AllArticels">
                                @foreach ($NavIndustries->random(5) as $industry)
                                <section>
                                    <div class="row">
                                        <div class="col-12 col-lg-5 d-none d-lg-block"
                                        style="background-image: url({{ ($industry->image->path) == 'seed' 
                                                ? "https://picsum.photos/200" 
                                                : ($industry->image->url()) }})"
                                        ></div>
                                        <div class="col-12 col-lg-7">
                                            <h1>
                                                {{ $industry->name }}
                                            </h1>
                                            <p>
                                                {!! Str::limit($industry->description, 200, $end='...') !!}
                                            </p>
                                            <button class="btn">
                                                <a style="text-decoration: none; color: white;" href="{{ route('industries.show', $industry->slug) }}">رفتن به صفحه مربوطه</a>
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

@include('components.faq')
<br>

<br>
@include('components.footer')

@endsection
