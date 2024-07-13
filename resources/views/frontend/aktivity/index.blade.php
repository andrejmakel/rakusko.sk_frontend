@extends('frontend.layout')
@section('content')
<div class="container mt-4 px-3">
  <div class="row">
    @foreach ($activities as $activity)
    <div class="blok col-12 col-md-6 col-lg-4 col-xl-3 px-3 py-2 px-md-2 py-md-2">
      <div class="shadow">
        <a href="/activity/{{ $activity->{'slug_'.trans('frontend.langShortcut')} }}" style="text-decoration: none;">
          <img src="{{ $activity->cover_img[0]->getFullUrl() }}" class="img-fluid mx-auto d-block" alt='{{$activity->{'title_'.trans('frontend.langShortcut')} }}'>
          <div style="height: 100px">
            <h4 class="ps-3 pt-3" style="color: rgb(201, 0, 0);"><strong>{{$activity->{'title_'.trans('frontend.langShortcut')} }}</strong></h4>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
