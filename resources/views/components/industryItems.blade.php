<div class="container-fluid industryItemsContainer">
    <div class="container">
        <div class="row">
            @foreach ($industries as $industry)
            <div class="col-12 col-md-6 col-lg-4">
                <section data-tilt data-tilt-glare data-tilt-max-glare="0.5" data-tilt-scale="1.1">
                        <a href="{{ route('industries.show', $industry->slug) }}">
                            <div>
                                <span>
                                    <img src="{{ $industry->image->path == 'seed' ? 'https://picsum.photos/200/300' : $industry->image->url() }}"
                                    class="card-img-top" alt="{{ $industry->name }}">
                                </span>
                                <h1>{{ $industry->name }}</h1>
                            </div>
                            <p>
                                {{ $industry->description }}
                            </p>
                            
                            {{-- <ul>
                                @foreach($industry->proposals as $proposal)
                                    @if($proposal->user)
                                        <li>
                                            {{ $proposal->user->name }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul> --}}
                        </a>
                    </section>
                </div>
            @endforeach
        </div>
    </div>
</div>
