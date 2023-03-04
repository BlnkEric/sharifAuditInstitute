<div class="container-fluid sliderContainer">
    <div class="container">
        <div class="carousel" data-flickity='{ "autoPlay": 5500 }'>
            {{-- @foreach ($sliderArticles as $item)
                
                <div class="carousel-cell">
                    <img src="{{ asset('images/LightHouseImage.png') }}"
                        alt="Bezarid hatamn,Point dare">
                </div>
            @endforeach --}}

            @foreach ($sliderArticles as $s_art)
                <div class="carousel-cell">
                    <img src="{{ $s_art->image->path == 'seed' ? 'https://picsum.photos/200/300/?blur=2' : $s_art->image->url() }}"
                        alt="{{ $s_art->slug }}">
                </div>
            @endforeach
            
            {{-- <div class="carousel-cell"></div>
            <div class="carousel-cell"></div>
            <div class="carousel-cell"></div>
            <div class="carousel-cell"></div> --}}
        </div>
    </div>
</div>
