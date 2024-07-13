@extends('frontend.layout')
@section('content')
    <div style="position: relative; width: 100%; height: 300px; overflow: hidden;">
        <!-- Mobile Cover Photo -->
        <img src="{{ $infos->cover_img[0]->getUrl() }}" class="d-block d-lg-none w-100" alt="{{$infos->originTransInfos[trans('frontend.langOrder')]->title}}"
            style="height:40vh; object-fit: cover; filter: brightness(50%);">
        <!-- Desktop Cover Photo -->
        <img src="{{ $infos->cover_img[0]->getUrl() }}" class="d-none d-lg-block w-100 pb-3" alt="{{$infos->originTransInfos[trans('frontend.langOrder')]->title}}"
            style="height:100%; object-fit: cover; filter: brightness(50%);">
        <h1
            style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;text-align: center; font-size: 60px;">
            {{ $infos->originTransInfos[trans('frontend.langOrder')]->title }}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="blog-post">
                    @if ($infos->originTransInfos[trans('frontend.langOrder')]->subtitle)
                        <h3>{{ $infos->originTransInfos[trans('frontend.langOrder')]->subtitle }}</h3>
                    @endif
                    <div>{!! $infos->originTransInfos[trans('frontend.langOrder')]->text !!}</div>
                </article>
            </div>
            {{-- Sidebar --}}
            <div class="col-md-4">
                <div class="position-sticky" style="top: 100px;">
                    <h4 class="bg-secondary rounded text-white text-center p-2 mb-3">{{ trans('frontend.sidebarTopText') }}
                    </h4>
                    {{-- Display defauld sidebar --}}
                    @if ($ads->isEmpty())
                        @foreach ($sidebars as $sidebar)
                            @if ($sidebar->link != '/info/' . $infos->originTransInfos[trans('frontend.langOrder')]->slug)
                                {{-- Do not display the same sidebar on the same article --}}
                                <div class="my-3 rounded thumbnail">
                                    <div class="gradient rounded" style="aspect-ratio: 16 / 9;">
                                        <a href="{{ $sidebar->link }}"
                                            @if (!Str::startsWith($sidebar->link, '/')) target="_blank" @endif class="stretched-link">
                                            <img src="{{ $sidebar->cover_img->getUrl() }}" class="rounded h-100 w-100"
                                                style="object-fit:cover;" alt="{{ $sidebar->title }}">
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
                            <div class="my-3 rounded thumbnail">
                                <div class="gradient rounded" style="aspect-ratio: 16 / 9;">
                                    <a href="{{ $sidebar->link }}" @if (!Str::startsWith($sidebar->link, '/')) target="_blank" @endif
                                        class="stretched-link">
                                        <img src="{{ $sidebar->cover_img->getUrl() }}" class="rounded h-100 w-100"
                                            style="object-fit:cover;" alt="{{ $sidebar->title }}">
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
