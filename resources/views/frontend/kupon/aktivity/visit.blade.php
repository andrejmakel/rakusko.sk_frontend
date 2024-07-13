@include('austria.home.menu')


<!-- mobil-start -->

<div class="d-md-none">
<!--
<div class="container">
 <div class="mt-3">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Vyhľadávanie" aria-label="Search">
        <button class="btn btn-danger" type="submit">Hľadaj</button>
    </form>
  </div>
</div>  
-->
<div class="album py-4 bg-light">
<div class="container">
<div class="row g-3">
  @foreach($places as $place)
  <div class="col-6">
    <div class="card" style="height: 100px">
       <div class="card-body bg-danger">
        <p class="card-text text-center text-white text-uppercase">{{ $place->title_sk ?? '' }}</p>
        <a href="{{ url($place->slug_sk ?? '' ) }}" class="stretched-link"></a>
       </div>
    </div>
  </div>
  @endforeach

  

  </div>
</div>
</div>
</div>



<!-- mobil-end -->

<!-- desktop-start -->
<div class="d-none d-md-block">


  @include('austria.home.search') 


<style>
    .card-footer {slug
      background: rgb(255, 0, 0);
      margin-top: -20px;
    }
</style>
    <div class="container pt-1">

        <div class="row row-cols-1 row-cols-md-4 g-3">
@foreach($places as $key => $place)
            <div class="col">
                <div class="card text-white text-center">
                    <img src="{{ $place->cardpic->getUrl() }}" class="card-img">
                    <div class="card-footer bg-secondary">  
                    <h5>{{ $place->title_sk ?? '' }}</h5>
                    <a href="{{ url($place->slug_sk ?? '' ) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
@endforeach
          </div>
       </div>



     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                       
@include('austria.home.footer')