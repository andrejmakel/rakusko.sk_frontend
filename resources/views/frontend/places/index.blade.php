@extends('frontend.layout')
@section('content')
    <div class="container mt-4 px-3">
        {{-- Filtrovanie záznamov --}}
        <form action="{{ route('austroinfo.places.filter') }}" method="GET" class="pb-5">
            <div class="btn-group-toggle" data-toggle="buttons">
                @foreach ($tags as $tag)
                    <label
                        class="btn {{ in_array($tag->id, request()->input('tags', [])) ? 'btn-secondary active' : 'btn-light' }}">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" onchange="this.form.submit();"
                            {{ in_array($tag->id, request()->input('tags', [])) ? 'checked' : '' }}>
                        {{ $tag->{'title_' . trans('frontend.langShortcut')} }}
                    </label>
                @endforeach
            </div>
            <div class="pt-1">
                <a href="/places" style="text-decoration: none">{{ trans('frontend.removeFilter') }}</a>
            </div>
        </form>
        <div class="row">
            @foreach ($transPlaces as $place)
                @if ($place->slug)
                    <div class="blok col-12 col-md-6 col-lg-4 col-xl-3 px-3 py-2 px-md-2 py-md-2">
                        <div class="shadow">
                            <a href="/places/{{ $place->slug }}" style="text-decoration: none;">
                                <img src="{{ $place->origin->cover_img[0]->getFullUrl() }}" class="h-100 w-100"
                                    alt="{{ $place->title }}" style="aspect-ratio: 16 / 9; object-fit:cover">
                                <div style="height: 100px">
                                    <h5 class="ps-3 pt-3" style="color: rgb(201, 0, 0);">
                                        <strong>{{ $place->title }}</strong></h5>
                                    <p class="ps-3" style="color: black;">{{ $place->subtitle }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
<script>
  /* Places filter */
  $(document).ready(function() {
      $('.btn-group-toggle label').on('click', function() {
          var checkbox = $(this).find('input[type="checkbox"]');
          if (checkbox.is(':checked')) {
              $(this).removeClass('btn-light').addClass('btn-secondary');
          } else {
              $(this).removeClass('btn-secondary').addClass('btn-light');
          }
      });
  });
</script>
@endsection

