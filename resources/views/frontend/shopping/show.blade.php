@extends('frontend.layout')
@section('content')
    <div style="position: relative; width: 100%; height: 300px; overflow: hidden;">
        <!-- Mobile Cover Photo -->
        <img src="{{ $malls->cover_img[0]->getUrl() }}" class="d-block d-lg-none w-100" alt="{{ $malls->title }}"
            style="height:40vh; object-fit: cover; filter: brightness(50%);">
        <!-- Desktop Cover Photo -->
        <img src="{{ $malls->cover_img[0]->getUrl() }}" class="d-none d-lg-block w-100 pb-3" alt="{{ $malls->title }}"
            style="height:100%; object-fit: cover; filter: brightness(50%);">
        <h1
            style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;text-align: center; font-size: 60px;">
            {{ $malls->title }}</h1>
    </div>
    <div class="container pt-1">
        <div class="row">
            <div class="col-md-8">
                <!-- Popis -->
                @if ($malls->originTransMalls[trans('frontend.langOrder')]->text)
                    <div class="p-2 mb-3 bg-light rounded">
                        <div class="mb-0">{!! $malls->originTransMalls[trans('frontend.langOrder')]->text !!}</div>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <!-- Mapa -->
                <div>
                    <iframe src="{{ $malls->map_embed }}" class="w-100 rounded-1 border d-block d-lg-none" height="200"
                        allowfullscreen="" loading="lazy"></iframe>
                    <iframe src="{{ $malls->map_embed }}" class="w-100 rounded-1 border d-none d-lg-block" height="200"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- Kategórie -->
                <div class="my-3">
                    <h4 class="fst-italic mb-3">{{ trans('frontend.categories') }}</h4>
                    <a href="/shopping/{{ $malls->slug }}"
                        class="btn {{ '' == $categoryName ? 'btn-secondary' : 'btn-light' }} mb-1">{{ trans('frontend.allCat') }}</a>
                    @foreach ($categories as $category)
                        <a href="/shopping/{{ $malls->slug }}/?tag={{ urlencode($category->title_sk) }}"
                            style="text-decoration: none">
                            <span
                                class="btn {{ $category->title_sk == $categoryName ? 'btn-secondary' : 'btn-light' }} mb-1">
                                {{ $category->{'title_' . trans('frontend.langShortcut')} }}
                            </span>
                        </a>
                    @endforeach
                </div>
                <!-- Obchody -->
                <div class="row">
                    @foreach ($shops as $shop)
                        <div class="col-6 col-lg-4 p-2">
                            <a href="/shopping/{{ $malls->slug }}/{{ $shop->slug }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="card shadow-lg p-1" style="max-height: 300px">
                                    <div class="container d-flex align-items-center justify-content-center"
                                        style="height: 150px">
                                        <img class="img-fluid" src="{{ $shop->logo->getUrl() }}" alt="{{ $shop->title }}"
                                            style="max-height: 150px">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title text-center">{{ $shop->title }}</h3>
                                        <p class="card-text text-center bg-danger text-white rounded p-3 mt-4"
                                            style="visibility: {{ is_null($shop->discount) ? 'hidden' : 'visible' }};">
                                            <b>{{ trans('frontend.discount') }} {{ $shop->discount }}</b></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Sidebar --}}
            <div class="col-md-4">
                <div class="position-sticky" style="top: 100px;">
                    <h4 class="bg-secondary rounded text-white text-center p-2 my-3">{{ trans('frontend.sidebarTopText') }}
                    </h4>
                    {{-- Display defauld sidebar --}}
                    @if ($ads->isEmpty())
                        @foreach ($sidebars as $sidebar)
                            @if ($sidebar->link != '/shopping/' . $malls->slug)
                                {{-- Do not display the same sidebar on the same article --}}
                                <div class="my-3 rounded" id="thumbnail">
                                    <div class="gradient rounded" style="aspect-ratio: 16 / 9;">
                                        <a href="{{ $sidebar->link }}"
                                            @if (!Str::startsWith($sidebar->link, '/')) target="_blank" @endif class="stretched-link">
                                            <img src="{{ $sidebar->cover_img->getUrl() }}" class="rounded h-100 w-100"
                                                style="object-fit:cover;" alt="{{$sidebar->title}}">
                                        </a>
                                    </div>
                                    <div class="text-block">
                                        <h3>{{ $sidebar->title }}</h3>
                                        <p>{{ $sidebar->subtitle }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- Display custom sidebar (ads) --}}
                    @else
                        @foreach ($ads as $sidebar)
                            <div class="my-3 rounded" id="thumbnail">
                                <div class="gradient rounded" style="aspect-ratio: 16 / 9;">
                                    <a href="{{ $sidebar->link }}" @if (!Str::startsWith($sidebar->link, '/')) target="_blank" @endif
                                        class="stretched-link">
                                        <img src="{{ $sidebar->cover_img->getUrl() }}" class="rounded h-100 w-100"
                                            style="object-fit:cover;" alt='{{$sidebar->title}}'>
                                    </a>
                                </div>
                                <div class="text-block">
                                    <h3>{{ $sidebar->title }}</h3>
                                    <p>{{ $sidebar->subtitle }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
