@include('frontend.home.menu')




 <div class="d-block d-md-none">
  <img src="pic/zoo_wien-mob.jpg" class="w-100"> <!-- TOPpicMOB --> 
 </div>

<main class="container">
 
<div class="d-none d-md-block">
<img src="pic/zoo_wien-big.jpg" class="w-100">  <!-- TOPpic -->
</div>

{{-- Kupón button START--}}


<a href="https://rakusko.sk/zoo" style="text-decoration: none">
  <button class="btn btn-lg btn-danger m-3 mt-5">
    Zľavový kupón - Slovensko
  </button>
</a>

<br>

<a href="https://rakousko24.cz/zoo" style="text-decoration: none">
  <button class="btn btn-lg btn-danger m-3">
    Slevový kupón - Česko
  </button>
</a>

<br>

<a href="https://ausztria123.hu/zoo" style="text-decoration: none">
  <button class="btn btn-lg btn-danger m-3">
    Diszkont kupon - Magyarország
  </button>
</a>


{{-- Kupón button END--}}

</main>




@include('frontend.home.footer')






