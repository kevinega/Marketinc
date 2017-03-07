@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/brand-home.css') }}" rel="stylesheet">
<link href="{{ asset('css/Jcrop.min.css') }}" rel="stylesheet">
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
    $pathCover = "storage/".Auth::guard()->user()->cover; 
    if($pathCover == "storage/"){
        $pathCover = "img/default-cover.png";
    }
@endphp

<div id="mySidenav" class="sidenav">
    <h6 class="sidenav-header">Welcome, <strong>{{ Auth::guard()->user()->brand_name }}</strong></h6>
    
    <div class="sidenav-menu">
        <a href="#">
            <div class="sidenav-package">
                <img src="{{ asset('img/sidebar-brandhome/basic.png') }}" class="sidenav-icon">
                BASIC
            </div>
        <a href="#promotions">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/promotion.png') }}" class="sidenav-icon">
                Promotions
            </div>
        </a>
        <a href="#details">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/details.png') }}" class="sidenav-icon">
                Details
            </div>
        </a>
        <a href="#pictures">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/picture.png') }}" class="sidenav-icon">
                Image
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/promotion.png') }}" class="sidenav-icon">
                Video
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/menu.png') }}" class="sidenav-icon">
                Menu
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/branches.png') }}" class="sidenav-icon">
                Branches
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/review.png') }}" class="sidenav-icon">
                Review
            </div>
        </a>
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/music.png') }}" class="sidenav-icon">
                Music
            </div>
        </a>
    </div>

    <div class="sidenav-preview">
        <a href="#">
            <div class="sidenav-feature">
                <img src="{{ asset('img/sidebar-brandhome/preview.png') }}" class="sidenav-icon">
                Preview
            </div>
        </a>
    </div>
</div>

<div id="main">
    <div class="container-fluid"> 
        <div class="feature-photo">
            @if ($errors->has('cover'))
                <div class="alert alert-danger" role="alert">
                    <strong> {!! $errors->first('cover', '<span class="alert-danger">:message</span>') !!} </strong>
                </div>
            @endif
            <!-- display picture -->
            <img id="cover-uploaded" class="cover">

            <!-- button trigger modal -->
            <div class="btn-upload-modal">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-cover-modal">
                    <i class="material-icons">add_a_photo</i>
                </button>
            </div>

            <!-- modal -->
            <div class="modal fade" id="upload-cover-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-label">Upload Cover</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="cover" class="cover">

                            <!-- form cropper -->
                            {!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!}
                            {{ csrf_field() }}
                            {!! Form::file('cover', ['id' => 'uploaded', 'class' => 'upload-cover']) !!}
                            {!! Form::hidden('x', '', array('id' => 'x')) !!}
                            {!! Form::hidden('y', '', array('id' => 'y')) !!}
                            {!! Form::hidden('w', '', array('id' => 'w')) !!}
                            {!! Form::hidden('h', '', array('id' => 'h')) !!}
                            {!! Form::button('Save Cover', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="feature-followers">
            <h6>1234 followers</h6>
            <button type="button" class="btn btn-primary btn-follow">Follow</button>
        </div> --}}
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
</div>
@endsection

@section('page-script')
<script src="{{ asset('js/Jcrop.min.js') }}"></script>
    <script>


        $(document).ready(function(){
            $("#cover-uploaded").attr('src', '{{ asset("$pathCover") }}');
        });

    var crop;
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#cover').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                //BIKIN PAGE(?)
                "Your Browser doesn't support FileReader API"
            }
        }

        // changes after new input image
        $("#uploaded").change(function(){
            readURL(this);
            refreshJcrop();
            $('#cover').style.display = 'block';
            $('#cover').style.width = '100%';
        });


        // initiate cropper
        function initJcrop(){
            $('#cover').Jcrop({
                boxWidth: 700,
                boxHeight: 700,
                setSelect: initCoords(),
                aspectRatio: 5 / 1,
                onSelect: updateCoords
            },function () { 
                crop = this; 
            });
        }

        // save coordinate cropper
        function updateCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        //init coordinates and give initial value to coordinate input
        function initCoords()
        {
            $('#x').val(0);
            $('#y').val(0);
            $('#w').val(300);
            $('#h').val(300);

             return [
               $('#x').val(),
               $('#y').val(),
               $('#w').val(),
               $('#h').val(),  
              ];
        };

        //Restart Jcrop
        function refreshJcrop() 
        {
            $('#cover').one('load', function(){
                if(crop != undefined){
                    crop.destroy();
                }
                initJcrop();
            });
        };

    </script>
@endsection