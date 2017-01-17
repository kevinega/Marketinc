@extends('layouts.masters.main')
@section('page-content')
    <div class="container">
      @include('layouts.partials.nav')
      <!-- Main component for a primary marketing message or call to action -->
      @forelse($brands as $brand)

      <div class="jumbotron">
        <h3>{{ $brand->title }}</h3>
        <p> {{ $brand->body }}</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">{{ $brand->promo }}</a>
        </p>
      </div>
      @empty
      <p>No Brand Yet.</p>
      @endforelse
    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
@stop
