<div>
    <section class="navigation">
        <div class="nav-container" id="navbar">
            {{-- <div class="brand">
                <a href="#!">Logo</a>
            </div> --}}

            <nav class="topnav" id="mainTopnav">
                {{-- <ul class="brand">
                    <li>
                        <a href="{{ route('login') }}">LOGO</a>
                    </li>
                </ul> --}}
                <ul>
                    <li>
                        <a onclick="toggleNavFunction()">LOGO <i class="fa fa-bars"></i></a>
                    </li>
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
                        <a href="{{ route('front.main') }}">صفحه اصلی</a>
                    </li>

                    <li id="industryNavToggle">
                        <a  onclick="toggleNavFunctionStyle(this.parentNode.id)" href="#!">صنایع</a>
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
                    <li id="servicesNavToggle">
                        <a  onclick="toggleNavFunctionStyle(this.parentNode.id)" href="#!">خدمات</a>
                        <ul class="nav-dropdown">
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
                            <li>
                                <a style="background-color: rgb(66, 127, 66)" href="{{ route('services.index') }}">همه خدمات</a>
                            </li>
                            {{-- </div> --}}
                        </ul>
                    </li>
                    <li class="articlesNav" id="articleNavToggle">
                        <a  onclick="toggleNavFunctionStyle(this.parentNode.id)" href="#!">مقالات</a>
                        <ul class="nav-dropdown">
                            <div class="row industryNavRow">
                                <div class="col-6 industryList">
                                    <li class="articleDropdown"><a href="#">مقالات منتشر شده در این صنایع</a></li>
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
                                <div class="col-3 industryArticles">
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
                    <li id="aboutusNavToggle">
                        <a  onclick="toggleNavFunctionStyle(this.parentNode.id)" href="#!">درباره ما</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('rules') }}">رسالت و ارزش ها</a></li>
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

