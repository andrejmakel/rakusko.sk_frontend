@include('frontend.partials.menu')
@section('content')

<body>

 <div class="d-block d-md-none">
  <img src="img/zoo_wien-mob.jpg" class="w-100"> <!-- TOPpicMOB --> 
 </div>

<main class="container">
 
 <div class="d-none d-md-block">
  <img src="img/zoo_wien-big.jpg" class="w-100">  <!-- TOPpic -->
 </div>

<div class="row">
     <div class="col-md-8">
<article class="blog-post">
    <h2 class="blog-post-title mt-2">Zľavový kupón - ušetrite na vstupnom do ZOO</h2>
    <div class="content">
      <p>Pokiaľ využijete zľavový kupón, ktorý si jednoducho stiahnete tu na našej stránke, môžete ušetriť pri návšteve viedenskej zoologickej záhrady <strong>na každú dospelú osobu 4 eurá a na každé dieťa 2 eurá</strong>.</p>
      <p>Rodina, dvaja dospelí s dvomi deťmi tak môžu ušetriť na vstupnom do ZOO až 12 EUR.</p>
      <p>Pri kúpe vstupeniek odovzdajte vytlačený zľavový kupón v pokladni ZOO a dostanete zľavu na vstupné.</p>
      <p>Na získanie zľavového kupónu zadajte <strong>zľavový kód</strong>, ktorý nájdete na našej stránke o <a href="zoo" target="_blank">ZOO</a> pod cenami vstupného.</p>
    </div>
<!--
<div class="row">
      <div class="col-md-4">
         <input class="form-control" type="text" placeholder="09XX 123456">
      </div>
      <div class="col-md">      
          <button type="submit" class="btn btn-primary">Pošli</button>
      </div>
</div>



      <br>

-->


<script>


    function process()
    {
        var url = "img/" + document.getElementById("url").value + "/TGS_Discount_Kupon_SK_012022.pdf";
        location.href = url;
        return false;    
    }

    function enableSubmit()
    {
        let inputs = document.getElementsByClassName('url');
        let btn = document.querySelector('input[type="submit"]');
        let isValid = true;
        for (var i = 0; i < inputs.length; i++){
        let changedInput = inputs[i];
        if (changedInput.value.trim() === "" || changedInput.value === null){
        isValid = false;
        break;
        }
        }
        btn.disabled = !isValid;
    }

</script>

<form onSubmit="return process();">

<div class="d-flex justify-content-center">
<div class="col-4">
     <input class="form-control text-center url" id="url" type="text" placeholder="Zadaj kód" onkeyup="enableSubmit()">
</div>
</div>
      <br>
      <div class="d-flex justify-content-center">
          <input type="submit" class="btn btn-danger" value="Stiahni a vytlač zľavový kupón" disabled>
      </div>
</form>



<br>  



<ul>
     <li>Zľavový kupón platí do 31.03.2023</li>
     <li>Jeden vytlačený kupón platí maximálne pre dve dospelé osoby a tri deti</li>
     <li>Zľavový kupón sa nedá kombinovať so zľavnenou rodinnou vstupenkou (použitie zľavového kupónu je výhodnejšie ako rodinná vstupenka za 60 €)</li>
     <li>Pokiaľ by vás bolo viac, vytlačte si jednoducho viac kupónov. Je to také jednoduché</li>
     <li>Zľavový kupón musí byť vytlačený na papieri!</li>
</ul>


        <div class="mb-3"></div>


<div class="mb-5"></div>

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
    @include('frontend.partials.footer')
</body>

@endsection



