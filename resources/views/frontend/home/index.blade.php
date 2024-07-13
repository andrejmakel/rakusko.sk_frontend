@extends('frontend.layout')
@section('content')
    {{-- Carousel --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($carousels as $index => $place)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                    class=@if($index === 0) "active" @endif
                    aria-current=@if($index === 0) "true" @else "false" @endif
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($carousels as $index => $place)
                <div class="carousel-item @if($index === 0) active @endif">
                    {{-- Desktop img --}}
                    <img src="{{ $place->cover_img->getFullUrl() }}" class="d-none d-md-block w-100 pb-3" alt="{{$place->title}}"
                        style="height:65vh; object-fit: cover;">
                    {{-- Mobile img --}}
                    @if ($place->cover_img_mobile)
                        <img src="{{ $place->cover_img_mobile->getFullUrl() }}" class="d-md-none w-100" alt="{{$place->title}}"
                            style=" width: 100%; height:50vh; object-fit: cover;">
                    @endif
                    {{-- Desktop img convertion to mobile --}}
                    @if (is_null($place->cover_img_mobile))
                        <img src="{{ $place->cover_img->getFullUrl() }}" class="d-md-none w-100" alt="{{$place->title}}"
                            style="width: 100%; height:50vh; object-fit: cover;">
                    @endif
                    <div class="carousel-caption d-md-block text-shadow">
                        <h1 style="text-shadow: 2px 2px 4px #000000;">{{ $place->title }}</h1>
                        <h3 style="text-shadow: 2px 2px 4px #000000;">{{ $place->subtitle }}</h3>
                        @if ($place->btn_1)
                            <a href="{{ $place->btn_1_link }}" class="btn btn-danger" @if (!Str::startsWith($place->btn_1_link, '/')) target="_blank" @endif>
                                {{ $place->btn_1 }}
                            </a>
                        @endif
                        @if ($place->btn_2)
                            <a href="{{ $place->btn_2_link }}" class="btn btn-warning" @if (!Str::startsWith($place->btn_2_link, '/')) target="_blank" @endif>
                                {{ $place->btn_2 }}
                            </a>
                        @endif
                        @if ($place->btn_3)
                            <a href="{{ $place->btn_3_link }}" class="btn btn-info" @if (!Str::startsWith($place->btn_3_link, '/')) target="_blank" @endif>
                                {{ $place->btn_3 }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @if ($holidays->count() > 0)
        @foreach ($holidays as $holiday)
            <a href="info/sviatky">
                <div class="top-right-div bg-danger text-white rounded m-1">{{ $holiday->holiday_name->title_sk }}:
                    {{ $holiday->date }}</div>
            </a>
        @endforeach
    @endif
    {{-- Desktop --}}
    <div class="container pt-5 pt-md-3 px-md-5 d-none d-md-block">
        <div class="row justify-content-center">
            <div class="col-6 col-md-3 px-1 py-1">
                <div class="rounded thumbnail-home">
                    <a href="/shopping" class="stretched-link">
                        <img src="img/shopping.jpg" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.shopping')}}">
                        <div class="text-block-home">
                            <h3 style="text-shadow: 2px 2px 4px #000000;">{{ trans('frontend.shopping') }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 px-1 py-1">
                <div class="rounded thumbnail-home">
                    <a href="/places" class="stretched-link">
                        <img src="img/places.jpg" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.places')}}">
                        <div class="text-block-home">
                            <h3 style="text-shadow: 2px 2px 4px #000000;">{{ trans('frontend.places') }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 px-1 py-1">
                <div class="rounded thumbnail-home">
                    <a href="/activity" class="stretched-link">
                        <img src="img/activity.jpg" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.activity')}}">
                        <div class="text-block-home">
                            <h3 style="text-shadow: 2px 2px 4px #000000;">{{ trans('frontend.activity') }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 px-1 py-1">
                <div class="rounded thumbnail-home">
                    <a href="/info" class="stretched-link">
                        <img src="img/info.jpg" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.info')}}">
                        <div class="text-block-home">
                            <h3 style="text-shadow: 2px 2px 4px #000000;">{{ trans('frontend.info') }}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobile --}}
    <div class="d-block d-md-none ">
        <div class="container mt-4">
            <div class="row">
                <div class="col-6 col-md-3 px-1 py-1 thumbnail-home">
                    <div>
                        <a href="/shopping" class="stretched-link">
                            <img src="img/mobileShopping.png" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.shopping')}}">
                        </a>
                    </div>
                    <div class="text-block-mobile-home">
                        <h3>{{ trans('frontend.shopping') }}</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3 px-1 py-1 thumbnail-home">
                    <div class="">
                        <a href="/places" class="stretched-link">
                            <img src="img/mobilePlaces.png" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.places')}}">
                        </a>
                    </div>
                    <div class="text-block-mobile-home">
                        <h3>{{ trans('frontend.places') }}</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3 px-1 py-1 thumbnail-home">
                    <div class="">
                        <a href="/activity" class="stretched-link">
                            <img src="img/mobileActivity.png" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.activity')}}">
                        </a>
                    </div>
                    <div class="text-block-mobile-home">
                        <h3>{{ trans('frontend.activity') }}</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3 px-1 py-1 thumbnail-home">
                    <div class="">
                        <a href="/info" class="stretched-link">
                            <img src="img/mobileInfo.png" class="rounded img-fluid mx-auto d-block" alt="{{trans('frontend.info')}}">
                        </a>
                    </div>
                    <div class="text-block-mobile-home">
                        <h3>{{ trans('frontend.info') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
