@extends('layouts.app')
@include('components.navbar')

@include('components.slideshow')


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

<div class="container-fluid articleSection2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <section>
                    <div class="row articelFilterRowSection2">
                        Filters
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="bigArticleSection2Item">
                                <section></section>
                                <section>
                                    <h1>Arash</h1>
                                    <p>ArashArasharasharash</p>
                                </section>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="articleSection2AllArticels">
                                <section>
                                    <div class="row">
                                        <div class="col-12 col-lg-5 d-none d-lg-block">abc</div>
                                        <div class="col-12 col-lg-7">
                                            <h1>Arash</h1>
                                            <p>arashArashaasharash</p>
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
            <div class="col-12 col-md-4">
                <section class="rightOfArticleSection2">
                    a
                </section>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
