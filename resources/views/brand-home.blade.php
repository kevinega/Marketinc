@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/brand-home.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('navbar')
@endsection

@section('content')
@if (session('message') != '')
<div class="alert alert-success" role="alert">
  <strong>Well done!</strong> {{ session('message') }}
</div>
@endif
    @php 
            $path = Auth::guard()->user()->cover;
        @endphp
        <img src="{{ asset("storage/$path") }}">
         @if ($errors->has('cover'))
            <div class="error-label">
                <i class="material-icons alert-danger">clear</i>
                {!! $errors->first('cover', '<span class="alert-danger">:message</span>') !!}
            </div>
        @endif

        {!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}

        {!! Form::file('cover') !!}
        {!! Form::button('Save Cover', ['type' => 'submit']) !!}
        {!! Form::close() !!}
        
    <div class="feature-photo">
        <!-- display picture -->
        <?php $path = Auth::guard()->user()->logo; ?>
        <img src="{{ asset("storage/$path") }}" class="photo-360">

        <!-- button trigger modal -->
        <div class="btn-upload-modal">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-logo-modal">
                <i class="material-icons">add_a_photo</i>
            </button>
        </div>

        <!-- modal -->
        <div class="modal fade" id="upload-logo-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-label">Upload Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        {!! Form::file('logo', ['class' => 'upload-logo']) !!}
                        {!! Form::button('Save Logo', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-followers">
        <h6>1234 followers</h6>
        <button type="button" class="btn btn-primary btn-follow">Follow</button>
    </div>

    <div class="container">
        <div class="feature">
            <div class="feature-flex-menu">
                <a href="#promotions"><h5>PROMOTIONS</h5></a>
                <a href="#details"><h5>DETAILS</h5></a>
                <a href="#menu"><h5>MENU</h5></a>
                <a href="#pictures"><h5>PICTURES</h5></a>
                <a href="#review"><h5>REVIEW</h5></a>
                <a href="#branches"><h5>BRANCHES</h5></a>
            </div>
        </div>
        <div class="feature" id="promotions">
            @include('sections.promotion-list')
        </div>
        <div class="feature" id="details">
            @include('sections.detail')
        </div>
        <div class="feature" id="pictures">
            @include('sections.album')
        </div>
        <div class="feature">
            @include('sections.article')
        </div>
        <div class="feature">
            @include('sections.map')
        </div>
        <div class="feature">
            @include('sections.music')
        </div>
        <div class="feature">
            @include('sections.video')
        </div>
    </div>
@endsection

@section('page-script')
<script>
$('.multi-item-carousel').carousel({
  interval: false
});

$('.multi-item-carousel .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    // for (var i=0;i<2;i++) {
    //     next=next.next();
    //     if (!next.length) {
    //         next = $(this).siblings(':first');
    //     }

    //     next.children(':first-child').clone().appendTo($(this));
    // }
    if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});

// // Instantiate the Bootstrap carousel
// $('.multi-item-carousel').carousel({
//   interval: false
// });

// // for every slide in carousel, copy the next slide's item in the slide.
// // Do the same for the next, next item.
// $('.multi-item-carousel .carousel-item').each(function(){
//   var next = $(this).next();

//   if (!next.length) {
//     next = $(this).siblings(':first');
//   }
//   next.children(':first-child').clone().appendTo($(this));
  
//   if (next.next().length>0) {
//     next.next().children(':first-child').clone().appendTo($(this));
//   } else {
//     $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
//   }
// });
</script>
@endsection