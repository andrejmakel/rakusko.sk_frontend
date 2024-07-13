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
  @foreach($infos as $info)
  <div class="col-6">
    <div class="card" style="height: 100px">
       <div class="card-body bg-danger">
        <p class="card-text text-center fw-bolder text-white text-uppercase">{{ $info->title_sk ?? '' }}</p>
        <a href="{{ url($info->slug_sk ?? '' ) }}" class="stretched-link"></a>
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


<br>


    <div class="container pt-1">

        <div class="row row-cols-1 row-cols-md-4 g-3">
@foreach($infos as $key => $info)
            <div class="col">
                <div class="card text-white text-center">
                    <img src="img/red.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                    <h3 class="card-title">{{ $info->title_sk ?? '' }}</h3>
                    <h4 class="card-title">{{ $info->subtitle_sk ?? '' }}</h4>
                    <a href="{{ url($info->slug_sk ?? '' ) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
@endforeach
          </div>
       </div>
     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                       
@include('austria.home.footer')