@extends('frontend.layout')
@section('content')
<div style="position: relative; width: 100%; height: 300px; overflow: hidden;">
  <!-- Mobile Cover Photo -->
  <img src="{{ $activity->cover_img[0]->getFullUrl() }}" class="d-block d-lg-none w-100" alt="{{$activity->{'title_'.trans('frontend.langShortcut')} }}" style="height:40vh; object-fit: cover; filter: brightness(50%);">
  <!-- Desktop Cover Photo -->
  <img src="{{ $activity->cover_img[0]->getFullUrl() }}" class="d-none d-lg-block w-100 pb-3" alt="{{$activity->{'title_'.trans('frontend.langShortcut')} }}" style="height:100%; object-fit: cover; filter: brightness(50%);">
  <h1 style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;text-align: center; font-size: 60px;">{{$activity->{'title_'.trans('frontend.langShortcut')} }}</h1>
</div>
<div class="container mt-4 px-3">
  <div class="row">
    @foreach ($transPosts as $transPost)
    @if ($transPost->slug)
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 px-3 py-2 px-md-2 py-md-2">
        <div class="shadow">
          <a href="{{$slug}}/{{$transPost->slug}}" style="text-decoration: none;">
            <img src="{{ $transPost->origin->cover_img[0]->getFullUrl() }}" class="h-100 w-100" alt="{{$transPost->title}}" style="aspect-ratio: 16 / 9; object-fit:cover">
            <div style="height: 100px">
              <h5 class="ps-3 pt-3" style="color: rgb(201, 0, 0);"><strong>{{$transPost->title}}</strong></h5>
              <p class="ps-3" style="color: black;">{{$transPost->subtitle}}</p>
            </div>
          </a>
        </div>
      </div>
    @endif
    @endforeach
  </div>
</div>
@endsection