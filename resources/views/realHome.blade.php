@extends('front.layouts.app')


@include('components.navbar')
@include('components.sliderLoop')


<div class="container-fluid workWithUsHomeContainer">
    <div class="container">
        <div class="row">
            <section>
                <h3>ارش خیلی دوست خوبی است</h3>
                <h1>ارش خیلی دوست خوبی است</h1>
            </section> 
        </div>
        <div class="header">
                <h1>خدمات اصلی موسسه حقوقی شریف</h1>
        </div>
        <div class="row">
            @foreach ($NavServices as $service)
                
            <div class="col-6 col-md-3">
                <a href="{{ route('services.show', $service->slug) }}">
                    <section style="background-image: url({{ ($service->image->path) == 'seed' 
                        ? "https://picsum.photos/200/300" 
                        : ($service->image->url()) }})">

                            {!! Str::limit($service->name, 30, $end='...') !!}
                    </section>
                </a>
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
                        <span class="float-start">فیلتر</span>
                        <span class="float-end">Arash</span>
                        <span class="float-end">Arash2</span>
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
                                <section>
                                        {!! Str::limit($mostRecentArticle->description, 200, $end='...') !!}
                                </section>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="articleSection2AllArticels">
                                <section>
                                    <div class="row">
                                        <div class="col-12 col-lg-5 d-none d-lg-block">abc</div>
                                        <div class="col-12 col-lg-7">
                                            <h1>Lorem ipsum dolor sit amet. حسين رو دوس داريم</h1>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    a
                                </section>
                                <section>
                                    a
                                </section>
                                <section>
                                    aadadadawd
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-3">
                <section class="rightOfArticleSection2" style="background-color:aqua">
                    a
                </section>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid introTemplate">
    <div class="container">
        <div class="row p-3">
            <div class="col-12 col-md 6">
                <section>
                    <h2>Arash Salan miresone</h2>
                    <h5 class="mt-4 mb-4">Arash Lorem ipsum Lorem ipsum dolor sit amet. corrupti. Temporibus nihil
                        molestiae ipsum aliquid alias totam facere.
                        Temporibus nihil
                        molestiae ipsum aliquid alias totam facere.
                        Temporibus nihil
                        molestiae ipsum aliquid alias totam facere.
                    </h5>
                    <button>SALAM</button>
                    <div>
                        <div class="m-2">😘<div>Arash</div>
                        </div>
                        <div>
                            <div>😘</div>Seifi
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md 6 introTemplateImageContainer">
                <div>

@include('components.faq')
<br>

<br>
@include('components.footer')
