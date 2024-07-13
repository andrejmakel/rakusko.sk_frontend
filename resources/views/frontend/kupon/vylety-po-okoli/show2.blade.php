@extends('austria.home.menu')
@section('content')

<section class="box">
   <article class="post full-post">

      <header class="post-header">
         <h1 class="box-heading">
            <a href="{{ URL::current() }}">{{ $posts->title }}</a>
            <time>
               <small>/ {{ $posts->created_at }} </small>
            </time>
         </h1>
      </header>

      <div class="post-content">
         <p>
            {{ $posts->text }}
         </p>

      </div>




   </article>
</section>




@endsection
