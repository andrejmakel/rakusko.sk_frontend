@include('austria.home.menu')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    
        <div class="carousel-inner">

          <div class="carousel-item active">
            <img src="img/zoo_wien-big.jpg" class="d-none d-md-block w-100" alt="...">
            <img src="img/zoo_wien-mob.jpg" class="d-block d-md-none w-100" alt="...">
            <div class="carousel-caption d-md-block">
              <h1>Viedenská ZOO</h1>
              <h3>Zážitok pre deti aj dospelých</h3>
              <a href="zoo" class="btn btn-warning">VIAC INFORMÁCIÍ</a>
            </div>
          </div>
 
          <div class="carousel-item">
            <img src="img/hausdesmeeres.jpg" class="d-none d-md-block w-100" alt="...">
            <img src="img/hausdesmeeres-mob.jpg" class="d-block d-md-none w-100" alt="...">
            <div class="carousel-caption d-md-block">
              <h1>Dom mora vo Viedni</h1>
              <h3>Objavte nádherný podmorský svet</h3>
              <a href="https://www.haus-des-meeres.at/" target="_blank" class="btn btn-danger">VIAC INFORMÁCIÍ</a>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/NaturhistorischesMuseumWien2.jpg" class="d-none d-md-block w-100" alt="...">
            <img src="img/NaturhistorischesMuseumWien2-mob.jpg" class="d-block d-md-none w-100" alt="...">
            <div class="carousel-caption d-md-block">
              <h1>Prírodovedné múzeum</h1>
              <h3>Ako sa vyvíjal náš svet</h3>
              <a href="https://www.nhm-wien.ac.at/en" target="_blank" class="btn btn-warning">VIAC INFORMÁCIÍ</a>
            </div>
          </div>

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
    </div>
<!-- mobil-start -->

<div class="d-md-none">

<div class="container">
 <div class="mt-3">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Vyhľadávanie" aria-label="Search">
        <button class="btn btn-danger" type="submit">Hľadaj</button>
    </form>
  </div>
</div>  

<div class="album py-4 bg-light">
<div class="container">
<div class="row g-3">
  @foreach($basecats as $basecat)
  <div class="col-6">
    <div class="card" style="height: 100px">
       <div class="card-body bg-danger">
        <p class="card-text text-center fw-bolder text-white text-uppercase">{{ $basecat->basecat_sk ?? '' }}</p>
        <a href="{{ url($basecat->slug_sk ?? '' ) }}" class="stretched-link"></a>
       </div>
    </div>
  </div>
  @endforeach

  

  </div>
</div>
</div>
</div>
</div>


<!-- mobil-end -->

<!-- desktop-start -->
<div class="d-none d-md-block">

<!-- desktop-start 
--> 


<div class="container">
      <div class="bg-light g-3"> 
       <div class="col-6 mx-auto p-3 m-3">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Vyhľadávanie" aria-label="Search">
                            <button class="btn btn-danger" type="submit">Hľadaj</button>
                        </form>
      </div>                 
      </div>
    </div>  




    <div class="container pt-1">

        <div class="row row-cols-1 row-cols-md-4 g-3">
@foreach($basecats as $key => $basecat)
            <div class="col">
                <div class="card text-white text-center">
                    <img src="img/red.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                    <h3 class="card-title">{{ $basecat->basecat_sk ?? '' }}</h3>
                    <a href="{{ url($basecat->slug_sk ?? '' ) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
@endforeach
          </div>
       </div>
     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                       
@include('austria.home.footer')