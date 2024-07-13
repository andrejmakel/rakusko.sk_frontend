@extends('austria.home.menu')
@section('content')

<body>

 <div class="d-block d-md-none">
  <img src="{{ $places->toppicmob->getUrl() }}" class="w-100"> <!-- TOPpicMOB --> 
 </div>

<main class="container">
 
 <div class="d-none d-md-block">
  <img src="{{ $places->toppic->getUrl() }}" class="w-100">  <!-- TOPpic -->
 </div>

<div class="row">
     <div class="col-md-8">
<article class="blog-post">
    <h2 class="blog-post-title mt-2">{{ $places->title_sk }}</h2>
    <div class="content">
      <p>{!! $places->excerp_sk !!}</p>
      <span id="dots"></span>
      <span id="more">{!! $places->text_sk !!}</span>
    </div>

<button class="btn btn-primary btn-sm mb-3 shadow-none"onclick="myFunction()" id="myBtn">Zobraziť viac</button>

        <div class="row">

                {!! $places->open_sk !!}

                {!! $places->price_sk !!}

        </div>

        <div class="mb-3"></div>

  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <div class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed header-one shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h4 class="fst-italic">Príjazd a parkovanie</h4>
      </button>
</div>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
      <div class="accordion-body">
        <p>{!! $places->parking_sk !!}</p> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h4 class="fst-italic">Praktické Informácie</h4>
      </button>
</div>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
      <div class="accordion-body">
        <p>{!! $places->practice_sk !!}</p> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      <h4 class="fst-italic">Kontakt</h4>
      </button>
</div>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
      <div class="accordion-body">
        <p>{!! $places->kontakt !!}</p> 
        <a href="{{ ($places->link ?? '' ) }}" target="_blank">{{ ($places->link ?? '' ) }}</a>
       </div>
    </div>
  </div>
</div>
<div class="mb-5"></div>

@if($places->id == 1)         
       <div class="d-block d-md-none d-grid gap-2">
          <div class="bg-success mb-2 py-3 text-center text-white rounded">
            <h3>Navigujte</h3>
          </div>
          <a class="btn btn-outline-primary mb-1 py-2 shadow-none" href="https://www.google.com/maps/dir//48.194879,16.264379/@48.1949202,16.2648023,16.00z/data=!4m2!4m1!3e0?" target="_blank" type="button">
          <h5><i class="bi bi-p-square-fill pe-3" style="font-size: 1.6rem;"></i>P+R Hüttelberg</h5>
          </a>
          <a class="btn btn-outline-primary mb-1 py-2 shadow-none" href="https://www.google.sk/maps/dir//48.1897471,16.4139099/@48.1902955,16.4157006,16.00z/data=!4m2!4m1!3e0?hl=sk" target="_blank" role="button">
          <h5><i class="bi bi-p-square-fill pe-2" style="font-size: 1.6rem;"></i>P+R Erdberg</h5>
          </a>
          <a class="btn btn-outline-primary mb-1 py-2 shadow-none" href="https://www.google.sk/maps/dir//48.1897471,16.4139099/@48.1902955,16.4157006,16.00z/data=!4m2!4m1!3e0?hl=sk" target="_blank" role="button">
          <h5><i class="bi bi-p-square-fill pe-2" style="font-size: 1.6rem;"></i>Seckendorff-Gedent-Weg</h5>
          </a>
          <a class="btn btn-outline-danger mb-1 py-2 shadow-none" href="https://www.google.com/maps/dir//48.1834012,16.3021475/@48.1829031,16.3029156,16.00z/data=!4m2!4m1!3e0?" target="_blank" role="button">
          <h5><i class="bi bi-box-arrow-in-up pe-3" style="font-size: 1.5rem;"></i>Hlavný vchod do ZOO</h5>
          </a>
      </div>
@endif

</article>
    </div>


    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">


        <style>
          .text-block {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            padding-left: 20px;
            padding-right: 20px;
          }
          .gradient:before{
            content:'';
            position:absolute;
            border-radius:5px;
            left:0; top:0;
            width:100%; height:100%;
            background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0), rgba(0,0,0,0.6), rgba(0,0,0,0.8), rgba(0,0,0,1)); 
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3;
          }
          .gradient:hover:before{
            opacity: 0.7;
          }
          #thumbnail{
            position: relative; 
            background-color: black;
          }
          #thumbnail p{
            font-size:19px;
          }

          #thumbnail .btn{
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
          }
          
        </style>



        <div class="my-4 rounded" id="thumbnail"> 
          <div class="gradient">
            <a href="https://www.haus-des-meeres.at" target="_blank" class="stretched-link">
              <img src="img/hausdesmeeres-big.jpg" class="rounded img-fluid mx-auto d-block" alt="dom_mora">
            </a>
            <button type="button" class="btn btn-primary btn-sm">Viedeň</button>
          </div>
          <div class="text-block">
            <h3>Dom mora:</h3>
            <p>Objavte nádherný podmorský svet</p>
          </div>
        </div>

        <div class="my-4 rounded" id="thumbnail">
          <div class="gradient">
            <a href="https://www.nhm-wien.ac.at" target="_blank" class="stretched-link">
              <img src="img/museum_thumbnail.jpg" class="rounded img-fluid mx-auto d-block" alt="dom_mora">
            </a>
            <button type="button" class="btn btn-primary btn-sm">Viedeň</button>
          </div>
          <div class="text-block">
            <h3>Prírodovedné múzeum:</h3>
            <p>Ako sa vyvíjal náš svet</p>
          </div>
        </div>

        <div class="my-4 rounded" id="thumbnail">
          <div class="gradient">
          <a href="https://shop.asfinag.at/sk/" target="_blank" class="stretched-link">
            <img src="img/dialnica_thumbnail.jpg" class="rounded img-fluid mx-auto d-block" alt="dom_mora"> 
          </a>
          <button type="button" class="btn btn-warning btn-sm">Dobre vedieť</button>
          </div>
          <div class="text-block">
            <h3>Dialničné známky v Rakúsku</h3>
            <p>Poplatky za úsekové mýta&nbsp;</p>
          </div>
        </div>



      </div>
    </div> 
  </div> 
  </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    @include('austria.home.footer')
</body>

@endsection



