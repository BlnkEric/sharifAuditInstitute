<div>
    <section class="navigation">
        <div class="nav-container" id="navbar">
            <div class="brand">
                <a href="#!">Logo</a>
            </div>

            <nav>
                <ul>
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}">حساب کاربری</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="nav-dropdown">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                    <li>
                        <a href="{{ route('front.main') }}">خانه</a></li>
                    <li>
                        <a href="#!">خدمات</a>
                        <ul class="nav-dropdown">
                            {{-- <div style="width: 450px; height:max-content; background-color:rgb(87, 87, 87)"> --}}

                            <li>
                                <a style="background-color: rgb(66, 127, 66)" href="{{ route('services.index') }}">همه خدمات</a>
                            </li>
                            @foreach ($NavServices as $service)
                                <li>
                                    <a href="{{ route('services.show', $service->slug) }}">
                                        {!! Str::limit($service->name, 25, $end='...') !!}
                                    </a>
                                    @if(count($service->specialServices))
                                    <ul>
                                        @foreach($service->specialServices as $sp_ser)
                                            <li>
                                                <a href="{{ route('specialServices.show', $sp_ser->slug) }}">
                                                    {!! Str::limit($sp_ser->name, 30, $end='...') !!}
                                                </a>                                        
                                            </li>                                        
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                            {{-- </div> --}}
                        </ul>
                    </li>
                    <li>
                        <a href="#!">صنایع</a>
                        <ul class="nav-dropdown">
                            {{-- <div style="width: 450px; height:max-content; background-color:rgb(87, 87, 87)"> --}}
                                @foreach ($NavIndustries as $industry)
                                <li>
                                    <a href="{{ route('industries.show', $industry->slug) }}">{{ $industry->name }}</a>
                                </li>
                                @endforeach
                                <li>
                                    <a style="background-color: rgb(66, 127, 66)" href="{{ route('industries.index') }}">همه صنایع</a>
                                </li>
                            {{-- </div> --}}
                        </ul>
                    </li>
                    <li><a href="#">همکاری با ما</a>
                        <ul class="nav-dropdown">
                            <li><a href="#">Photoshop</a></li>
                            <li><a href="#">Illustrator</a></li>
                            <li><a href="#">Web Design</a>
                                <ul>
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="articlesNav"><a href="#!">مقالات</a>
                        <ul class="nav-dropdown">
                            <div class="row">
                                <div class="industryList">
                                    <li><a href="#">مفالات منتشر شده در این صنایع</a></li>
                                    @foreach ($NavIndustries->random(3) as $industry)
                                        <li>
                                            <a href="{{ route('industry.articles', $industry->slug) }}">
                                                @if (Str::length($industry->name) < 27)
                                                    {!! Str::of($industry->name)->padBoth(26, '--') !!}
                                                @else
                                                    {!! Str::limit($industry->name, 27, $end='...') !!}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                                <div class="industryArticles">
                                    @foreach ($NavArticles->random(2) as $article)
                                        <div>
                                            <a href="{{ route('articles.show', $article->slug) }}">
                                                <img src="{{ $article->image->path == 'seed' ? 'https://picsum.photos/800/400' : $article->image->url() }}"
                                                    class="navArticleImage card-img-top" alt="{{ $article->name }}">
                                                <h1>{{ $article->name }}</h1>
                                                {!! Str::limit($industry->description, 27, $end='...') !!}
                                            </a>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="#!">درباره ما</a>
                        <ul class="nav-dropdown">
                            <li><a href="#">رسالت و ارزش ها</a></li>
                            <li><a href="{{ route('staffs.index') }}">اعضای هیئت مدیره و شرکا</a></li>
                            <li><a href="#">کمیته های تخصصی</a></li>
                            <li><a href="{{ route('jobOffers.index') }}">فرصت های شغلی</a></li>
                            <li><a href="{{ route('contactus') }}">راه های ارتباطی</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</div>

