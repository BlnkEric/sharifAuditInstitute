@extends('front.layouts.app')
@section('content')

<div class="container-fluid articleContainer mt-5">
    <div class="container">
        @foreach ($industry_articles as $item)
            JUSES
        @endforeach
        <div class="row">
            <div class="col-12 col-md-6">
                <section class="underTheArticle">
                    <div class="overTheArticle">aww</div>
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
                        <span class="float-start">فیلتر</span>
                        <span class="float-end">Arash</span>
                        <span class="float-end">Arash2</span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="bigArticleSection2Item">
                                <section></section>
                                <section>
                                    <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, sit?</h1>
                                    <p><span>Tarikh</span><span class="ms-2">Nevinsande</span></p>
                                </section>
                                <section>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque cumque nam, iure magnam sit inventore eaque libero doloribus aspernatur recusandae voluptates molestias corrupti quo. Beatae?</p>
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

@include('components.footer')
@endsection

