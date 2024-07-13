@extends('frontend.layout')
@section('content')
    <div class="container mt-4 px-3">
        <div class="row">
            @foreach ($transMalls as $transMall)
                <div class="blok col-12 col-md-6 col-lg-4 col-xl-3 px-3 py-2 px-md-2 py-md-2">
                    <div class="shadow">
                        <a href="/shopping/{{ $transMall->origin->slug }}" style="text-decoration: none;">
                            <img src="{{ $transMall->origin->cover_img[0]->getFullUrl() }}" class="h-100 w-100" alt="{{ $transMall->origin->title }}"
                                style="aspect-ratio: 16 / 9; object-fit:cover">
                            <div style="height: 100px">
                                <h5 class="ps-3 pt-3" style="color: rgb(201, 0, 0);">
                                    <strong>{{ $transMall->origin->title }}</strong></h5>
                                <p class="ps-3" style="color: black;">{{ $transMall->subtitle }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
