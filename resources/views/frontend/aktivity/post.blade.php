@extends('frontend.layout')
@section('content')
    <div class="container">
        <!-- Mobile Cover Photo -->
        <img src="{{ $posts->cover_img[0]->getUrl() }}" class="d-block d-md-none w-100"
            alt="{{ $posts->originTransPosts[trans('frontend.langOrder')]->title }}">
        <!-- Desktop Cover Photo -->
        <img src="{{ $posts->cover_img[0]->getUrl() }}" class="d-none d-md-block w-100 pb-3"
            alt="{{ $posts->originTransPosts[trans('frontend.langOrder')]->title }}" style="height:50vh; object-fit: cover;">
        <div class="row">
            <div class="col-md-8">
                <article class="blog-post">
                    <h2 class="blog-post-title mt-2">{{ $posts->originTransPosts[trans('frontend.langOrder')]->title }}</h2>
                    @if ($posts->originTransPosts[trans('frontend.langOrder')]->subtitle)
                      <h3 class="blog-post-title mt-2">{{ $posts->originTransPosts[trans('frontend.langOrder')]->subtitle }}
                    @endif
                    </h3>
                    {{-- Article --}}
                    <div>{!! $posts->originTransPosts[trans('frontend.langOrder')]->text !!}</div>
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
                            @if ($sidebar->link != '/activity/' . $slugActivity . '/' . $posts->originTransPosts[trans('frontend.langOrder')]->slug)
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
