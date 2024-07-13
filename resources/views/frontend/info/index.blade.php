@extends('frontend.layout')
@section('content')
    {{-- Desktop --}}
    <div class="container mt-4 px-3 d-none d-md-block">
        <div class="row">
            @foreach ($transInfos as $transInfo)
                @if ($transInfo->slug)
                    <div class="blok col-12 col-md-6 col-lg-4 col-xl-3 px-3 py-2 px-md-2 py-md-2">
                        <div class="shadow">
                            <a href="info/{{ $transInfo->slug }}" style="text-decoration: none;">
                                <img src="{{ $transInfo->origin->cover_img[0]->getFullUrl() }}" class="h-100 w-100"
                                    alt="{{ $transInfo->title }}" style="aspect-ratio: 16 / 9; object-fit:cover">
                                <div style="height: 100px">
                                    <h5 class="ps-3 pt-3" style="color: rgb(201, 0, 0);">
                                        <strong>{{ $transInfo->title }}</strong></h5>
                                    <p class="ps-3" style="color: black;">{{ $transInfo->subtitle }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    {{-- Mobile --}}
    <div class="container mt-2 px-3 d-block d-md-none">
        <div class="album py-2">
            <div class="row g-3">
                @foreach ($transInfos as $index => $transInfo)
                    @if ($transInfo->slug)
                        <div class="col-6">
                            <div class="card shadow" style="height: 130px">
                                <div class="card-body {{ $index > 3 ? 'bg-primary' : 'bg-success' }} rounded">
                                    <h5 class="card-text text-center fw-bolder text-white text-uppercase">
                                        {{ $transInfo->title }}</h5>
                                    <a href="/info/{{ $transInfo->slug }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
