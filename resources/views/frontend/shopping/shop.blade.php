@extends('frontend.layout')
@section('content')
    <div class="container pt-5">
        <div class="row bg-light pt-3">
            {{-- Kategórie --}}
            <div>
                @foreach ($shops->categories as $category)
                    <i class="d-inline p-2"><span
                            class="text-secondary">#{{ $category->{'title_' . trans('frontend.langShortcut')} }}</span></i>
                @endforeach
            </div>
            <!-- Karta obchodu -->
            <div class=" col-sm-4 p-4">
                <div class="card shadow-lg">
                    <div class="px-3 pt-3 px-sm-5 container d-flex align-items-center justify-content-center"
                        style="height: 250px">
                        <img class="card-img-top " src="{{ $shops->logo->getUrl() }}" alt="{{ $shops->title }}"
                            style="max-height: 250px">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title text-center">{{ $shops->title }}</h2>
                        <p class="card-text text-center bg-danger text-white rounded p-3 mt-4"
                            style="visibility: {{ is_null($shops->discount) ? 'hidden' : 'visible' }};">
                            <b>{{ trans('frontend.discount') }} {{ $shops->discount }}</b></p>
                    </div>
                </div>
            </div>
            <!-- Otváracie hodiny -->
            @if ($shops->openings->isNotEmpty())
                <div class="col-sm-4 pt-4">
                    <div class="custom-vertical-center">
                        <table class="table">
                            <tbody>
                                @foreach ($shops->openings as $opening)
                                    <tr>
                                        <td>{{ $opening->open_text[trans('frontend.langShortcut')] }}</td>
                                        <td>{{ $opening->open_hours }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p><i>{!! $shops->originTransShops->where('lang_id', trans('frontend.langId'))->pluck('opening_note')->first() !!}</i></p>
                    </div>
                </div>
            @endif
            <!-- Popis -->
            <div class="col-sm-4 p-4">
                <div class="custom-vertical-center">
                    <div>{!! $shops->originTransShops->where('lang_id', trans('frontend.langId'))->pluck('text')->first() !!}</div>
                </div>
            </div>
        </div>
        <hr class="hr my-5">
        <div class="row">
            <!-- Galéria -->
            {{--
  <div>
    @foreach ($shops->categories as $category)
        <i class="d-inline"><span class="text-secondary">{{$category->title_sk}}</span></i>
    @endforeach
  </div>
  <div class="col-sm-6 p-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/show1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/show2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/show3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div> --}}
            <!-- Mapa -->
            {{--   <div class="col-sm-6 p-5">
    <img src="img/mapa.jpg" alt="" class="img-fluid">
  </div> --}}
        </div>
    </div>
@endsection
