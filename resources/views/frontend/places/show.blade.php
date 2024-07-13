@extends('frontend.layout')
@section('content')
    {{-- Mobile Gallery --}}
    <div class="d-block d-md-none myGallery-mobile">
        <div style="position: relative;">
            <img src="{{ $places->cover_img[0]->getUrl() }}" class="w-100" alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}">
            {{-- gallery button --}}
            @if (count($places->cover_img) > 1)
                <a href="{{ $places->cover_img[0]->getUrl() }}" target="_blank" class="m-2 btn btn-sm btn-light"
                    style="position: absolute; bottom: 10px; right: 10px;">
                    <i class="fa fa-camera"></i> +{{ count($places->cover_img) }}
                </a>
            @endif
        </div>
        {{-- load other IMGs --}}
        @if (count($places->cover_img) > 1)
            @foreach ($places->cover_img as $index => $image)
                @if ($index > 0)
                    <a href="{{ $image->getUrl() }}" target="_blank">
                        <img src="{{ $image->getUrl() }}" class="w-100 d-none" alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}">
                    </a>
                @endif
            @endforeach
        @endif
    </div>
    <div class="container">
        <!-- Desktop gallery -->
        @if (count($places->cover_img) > 2)
            <div class="d-none d-md-block">
                <div class="myGallery py-5">
                    <div class="row" style="height: 30em">
                        {{-- First IMG --}}
                        <div class="col-8">
                            <a href="{{ $places->cover_img[0]->getUrl() }}" target="_blank">
                                <img src="{{ $places->cover_img[0]->getUrl() }}" class="shadow w-100 rounded h-100 shadow"
                                    alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}" style="object-fit: cover;">
                            </a>
                        </div>
                        <div class="col-4">
                            {{-- Second IMG --}}
                            <div class="pb-2" style="height: 15em">
                                <a href="{{ $places->cover_img[1]->getUrl() }}" target="_blank">
                                    <img src="{{ $places->cover_img[1]->getUrl() }}"
                                        class="shadow w-100 rounded h-100 shadow" alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}" style="object-fit: cover;">
                                </a>
                            </div>
                            @if (count($places->cover_img) == 3)
                                {{-- Third IMG without filter --}}
                                <div class="pt-3" style="height: 15em">
                                    <a href="{{ $places->cover_img[2]->getUrl() }}" target="_blank">
                                        <img src="{{ $places->cover_img[2]->getUrl() }}"
                                            class="shadow w-100 rounded h-100 shadow" alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}"
                                            style="object-fit: cover;">
                                    </a>
                                </div>
                            @else
                                {{-- Third IMG with filter --}}
                                <div class="pt-3 position-relative" style="height: 15em">
                                    <a href="{{ $places->cover_img[2]->getUrl() }}" target="_blank">
                                        <img src="{{ $places->cover_img[2]->getUrl() }}" class="shadow w-100 rounded h-100"
                                            alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}" style="object-fit: cover; filter: brightness(50%);">
                                        <h2 class="position-absolute top-50 start-50 translate-middle text-center"
                                            style="color: white;">{{ trans('frontend.showGallery') }}
                                            (+{{ count($places->cover_img) - 3 }})</h2>
                                    </a>
                                </div>
                                {{-- load other IMGs --}}
                                @foreach ($places->cover_img as $index => $image)
                                    @if ($index > 2)
                                        <a href="{{ $image->getUrl() }}" target="_blank">
                                            <img src="{{ $image->getUrl() }}" class="w-100 d-none" alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}">
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endif
        <div class="row">
            <div class="col-md-8">
                {{-- One IMG --}}
                <div class="d-none d-md-block">
                    @if (count($places->cover_img) < 3)
                        <img src="{{ $places->cover_img[0]->getUrl() }}" class="my-3 w-100 rounded shadow" alt="{{$places->originTransPlaces[trans('frontend.langOrder')]->title}}" 
                        style="height: 30rem; object-fit: cover;">
                    @endif
                </div>
                <article class="blog-post">
                    <h2 class="blog-post-title mt-2">{{ $places->originTransPlaces[trans('frontend.langOrder')]->title }}
                    </h2>
                    {{-- Kupón button START --}}
                    @if ($places->id == 168 && trans('frontend.langShortcut') == 'sk')
                        <a href="/zoo" class="btn btn-danger">
                            Zľavový kupón
                        </a>
                    @endif
                    @if ($places->id == 168 && trans('frontend.langShortcut') == 'cs')
                        <a href="/zoo" class="btn btn-danger">
                            Slevový kupón
                        </a>
                    @endif
                    @if ($places->id == 168 && trans('frontend.langShortcut') == 'hu')
                        <a href="/zoo" class="btn btn-danger">
                            Diszkont kupon
                        </a>
                    @endif
                    {{-- Kupón button END --}}
                    @if ($places->originTransPlaces[trans('frontend.langOrder')]->subtitle)
                        <h3 class="blog-post-title mt-2">
                            {{ $places->originTransPlaces[trans('frontend.langOrder')]->subtitle }}</h3>
                    @endif
                    {{-- Article --}}
                    {!! $places->originTransPlaces[trans('frontend.langOrder')]->excerp !!}
                    <span id="dots"></span>
                    <div id="more">{!! $places->originTransPlaces[trans('frontend.langOrder')]->text !!}</div>
                    <button class="btn btn-primary btn-sm mb-3 shadow-none" onclick="myFunction()"
                        id="myBtn">{{ trans('frontend.displayMore') }}</button>
                    {{-- Opening and Price --}}
                    <div class="row">
                        @if ($places->openings->isNotEmpty())
                            <div class="col-lg-6">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('frontend.openingHours') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($places->openings as $opening)
                                            <tr>
                                                <td>{{ $opening->open_text[trans('frontend.langShortcut')] }}</td>
                                                <td class="text-end">{{ $opening->open_hours }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="font-style: italic;">{!! $places->originTransPlaces[trans('frontend.langOrder')]->opening_note !!}</div>
                            </div>
                        @endif
                        @if ($places->prices->isNotEmpty())
                            <div class="col-lg-6">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('frontend.prices') }}</th>
                                            <th>EUR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($places->prices as $price)
                                            <tr>
                                                <td>{{ $price->price_text[trans('frontend.langShortcut')] }}</td>
                                                <td class="text-end">{{ $price->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="font-style: italic;">{!! $places->originTransPlaces[trans('frontend.langOrder')]->price_note !!}</div>
                            </div>
                        @endif
                    </div>
                </article>
                {{-- Parking, info, contact accordion --}}
                <div class="accordion" id="accordionExample">
                    @if ($places->originTransPlaces[trans('frontend.langOrder')]->parking)
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed header-one shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne" style="font-size: 20px">
                                    {{ trans('frontend.arrivalParking') }}
                                </button>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    {!! $places->originTransPlaces[trans('frontend.langOrder')]->parking !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($places->originTransPlaces[trans('frontend.langOrder')]->info)
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo" style="font-size: 20px">
                                    {{ trans('frontend.practicalInfo') }}
                                </button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    {!! $places->originTransPlaces[trans('frontend.langOrder')]->info !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($places->originTransPlaces[trans('frontend.langOrder')]->kontakt)
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree" style="font-size: 20px">
                                    {{ trans('frontend.contact') }}
                                </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    {!! $places->originTransPlaces[trans('frontend.langOrder')]->kontakt !!}
                                    <a href="{{ $places->originTransPlaces[trans('frontend.langOrder')]->link ?? '' }}"
                                        target="_blank">{{ $places->originTransPlaces[trans('frontend.langOrder')]->link ?? '' }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mb-5"></div>
                {{-- Nav --}}
                {{-- @if ($places->id == 1)
                    <div class="d-block d-md-none d-grid gap-2">
                        <div class="bg-success mb-2 py-3 text-center text-white rounded">
                            <h3>Navigujte</h3>
                        </div>
                        <a class="btn btn-outline-primary mb-1 py-2 shadow-none"
                            href="https://www.google.com/maps/dir//48.194879,16.264379/@48.1949202,16.2648023,16.00z/data=!4m2!4m1!3e0?"
                            target="_blank" type="button">
                            <h5><i class="bi bi-p-square-fill pe-3" style="font-size: 1.6rem;"></i>P+R Hüttelberg</h5>
                        </a>
                        <a class="btn btn-outline-primary mb-1 py-2 shadow-none"
                            href="https://www.google.sk/maps/dir//48.1897471,16.4139099/@48.1902955,16.4157006,16.00z/data=!4m2!4m1!3e0?hl=sk"
                            target="_blank" role="button">
                            <h5><i class="bi bi-p-square-fill pe-2" style="font-size: 1.6rem;"></i>P+R Erdberg</h5>
                        </a>
                        <a class="btn btn-outline-primary mb-1 py-2 shadow-none"
                            href="https://www.google.sk/maps/dir//48.1897471,16.4139099/@48.1902955,16.4157006,16.00z/data=!4m2!4m1!3e0?hl=sk"
                            target="_blank" role="button">
                            <h5><i class="bi bi-p-square-fill pe-2" style="font-size: 1.6rem;"></i>Seckendorff-Gedent-Weg
                            </h5>
                        </a>
                        <a class="btn btn-outline-danger mb-1 py-2 shadow-none"
                            href="https://www.google.com/maps/dir//48.1834012,16.3021475/@48.1829031,16.3029156,16.00z/data=!4m2!4m1!3e0?"
                            target="_blank" role="button">
                            <h5><i class="bi bi-box-arrow-in-up pe-3" style="font-size: 1.5rem;"></i>Hlavný vchod do ZOO
                            </h5>
                        </a>
                    </div>
                @endif --}}
            </div>
            {{-- Sidebar --}}
            <div class="col-md-4">
                <div class="position-sticky" style="top: 100px;">
                    <h4 class="bg-secondary rounded text-white text-center p-2 mb-3">
                        {{ trans('frontend.sidebarTopText') }}</h4>
                    {{-- Display defauld sidebar --}}
                    @if ($ads->isEmpty())
                        @foreach ($sidebars as $sidebar)
                            @if ($sidebar->link != '/places/' . $places->originTransPlaces[trans('frontend.langOrder')]->slug)
                                {{-- Do not display the same sidebar on the same article --}}
                                <div class="my-3 rounded thumbnail">
                                    <div class="gradient rounded" style="aspect-ratio: 16 / 9;">
                                        <a href="{{ $sidebar->link }}"
                                            @if (!Str::startsWith($sidebar->link, '/')) target="_blank" @endif
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
                            @endif
                        @endforeach
                        {{-- Display custom sidebar (ads) --}}
                    @else
                        @foreach ($ads as $sidebar)
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
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");
            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "{{ trans('frontend.displayMore') }}";
                moreText.style.display = "none";
                window.scrollTo(0, 0);
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "{{ trans('frontend.displayLess') }}";
                moreText.style.display = "inline";
            }
        }
        $('#accordion').on('shown.bs.collapse', function() {
            var panel = $(this).find('.in');
            $('html, body').animate({
                scrollTop: panel.offset().top
            }, 500);
        });
        window.addEventListener('load', function() {
            scpopLoad('.myGallery');
        });
        window.addEventListener('load', function() {
            scpopLoad('.myGallery-mobile');
        });
    </script>
@endsection
