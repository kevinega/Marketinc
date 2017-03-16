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

    $pathLogo = "storage/".Auth::guard()->user()->logo; 
@endphp

<div class="sidenav">
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
        <a href="#" id="preview">
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
            {{-- <!-- display picture -->
            <img id="cover-uploaded" class="cover"> --}}

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
                            <div class="cover-error" role="alert">
                                <strong> {!! $errors->first('cover', '<span class="alert-danger cover-error">:message</span>') !!} </strong>
                            </div>
                            <img id="cover" class="cover">

                            <!-- form cropper -->
                            {{-- {!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!} --}}
                            {!! Form::open(['id' => 'form-cover', 'enctype' => 'multipart/form-data']) !!}
                            {{ csrf_field() }}
                            {!! Form::file('cover', ['id' => 'uploaded', 'class' => 'upload-cover', 'name' => 'cover']) !!}
                            {!! Form::hidden('x', '', array('id' => 'x', 'name' => 'x')) !!}
                            {!! Form::hidden('y', '', array('id' => 'y', 'name' => 'y')) !!}
                            {!! Form::hidden('w', '', array('id' => 'w', 'name' => 'w')) !!}
                            {!! Form::hidden('h', '', array('id' => 'h', 'name' => 'h')) !!}
                            {!! Form::button('Save Cover', ['class' => 'btn btn-primary btn-block', 'id' => 'btn-upload-cover', 'type' => 'submit']) !!}
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

    <img id="logo-uploaded" src = {{ asset("$pathLogo") }} class="logo">

    <img id="logo" class="logo">

    <!-- form cropper -->
    <div class="logo-error" role="alert">
        <strong> {!! $errors->first('cover', '<span class="alert-danger logo-error">:message</span>') !!} </strong>
    </div>
    {!! Form::open(['id' => 'form-logo', 'enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
    {!! Form::file('logo', ['id' => 'uploaded-logo']) !!}
    {!! Form::hidden('x-logo', '', array('id' => 'x-logo')) !!}
    {!! Form::hidden('y-logo', '', array('id' => 'y-logo')) !!}
    {!! Form::hidden('w-logo', '', array('id' => 'w-logo')) !!}
    {!! Form::hidden('h-logo', '', array('id' => 'h-logo')) !!}
    {!! Form::button('Save logo', ['type' => 'submit']) !!}
    {!! Form::close() !!}


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
        var cropCover;
        var cropLogo;

        $(document).ready(function(){
            // $("#cover-uploaded").attr('src', '{{ asset("$pathCover") }}');
            $(".feature-photo").css('background-image', 'url({{ asset("$pathCover") }})');
            // bismilla validation
            $("#form-cover").submit(function(e) {
                e.preventDefault();
                var formD = new FormData(this);
                $.ajax({
                    url: '/brand/upload/coverValidator',
                    type: 'post',
                    dataType: 'json',
                    data: formD,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(data) {
                        if(data.status == "errors") {
                            $(".cover-error").addClass("alert alert-danger");
                            $(".cover-error").text(data.message.cover[0]);
                            cropCover.destroy();
                            cropCover = undefined;
                            $('#form-cover').trigger('reset');
                            $("#cover").removeAttr("src");
                            $("#cover").removeAttr("style");

                        } else if(data.status == "success") {
                            location.reload();
                        }
                    },
                    error: function(data) {
                        $(".cover-error").append("Upload Cover Error");
                    }
                });
            });

            $("#form-logo").submit(function(e) {
                e.preventDefault();
                var formD = new FormData(this);

                $.ajax({
                    url: '/brand/upload/logoValidator',
                    type: 'post',
                    dataType: 'json',
                    data: formD,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(data) {
                        if(data.status == "errors") {
                            console.log(data);
                            // $(".cover-error").addClass("alert alert-danger");
                            // $(".cover-error").text(data.message.cover[0]);
                            cropLogo.destroy();
                            cropLogo = undefined;
                            $('#form-logo').trigger('reset');
                            $("#logo").removeAttr("src");
                            $("#logo").removeAttr("style");

                        } else if(data.status == "success") {
                            location.reload();
                        }
                    },
                    error: function(data) {
                        // $(".cover-error").append("Upload Cover Error");
                    }
                });
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    if(input.name == "cover"){
                        $('#cover').attr('src', e.target.result);
                    } else if (input.name == "logo"){
                        $('#logo').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                //BIKIN PAGE(?)
                "Your Browser doesn't support FileReader API"
            }
        }

        // changes after new input image
        $("#uploaded").change(function() {
            $(".cover-error").text("");
            $(".cover-error").removeClass("alert alert-danger");
            readURL(this);
            refreshJcrop(this.name);
        });

        $("#uploaded-logo").change(function() {
            // $(".cover-error").text("");
            // $(".cover-error").removeClass("alert alert-danger");
            readURL(this);
            refreshJcrop(this.name);
        });


        // initiate cropper
        function initJcrop(input){
            if(input == "cover"){
                $('#cover').Jcrop({
                    applyFilters: [ 'constrain', 'extent', 'backoff', 'ratio', 'round', 'shader' ],
                    boxWidth: 700,
                    boxHeight: 700,
                    setSelect: initCoords(input),
                    aspectRatio: 5 / 1,
                    onSelect: updateCoords
                },function () { 
                    cropCover = this; 
                });

            } else if(input == "logo"){

                var CircleSel = function(){};

                // Set the custom selection's prototype
                CircleSel.prototype = new $.Jcrop.component.Selection();
                //extending it
                $.extend(CircleSel.prototype,{
                    zoomscale: 1,
                    attach: function(){
                        this.frame.css({
                          background: 'url(' + $('#logo')[0].src.replace('750','750') + ')'
                        });
                    },
                    positionBg: function(b){
                        var midx = ( b.x + b.x2 ) / 2;
                        var midy = ( b.y + b.y2 ) / 2;
                        var ox = (-midx*this.zoomscale)+(b.w/2);
                        var oy = (-midy*this.zoomscale)+(b.h/2);
                        this.frame.css({ backgroundPosition: ox+'px '+oy+'px' });
                        // this.frame.css({ backgroundPosition: -(b.x+1)+'px '+(-b.y-1)+'px' });
                    },
                    redraw: function(b){
                        // Call original update() method first, with arguments
                        $.Jcrop.component.Selection.prototype.redraw.call(this,b);

                        this.positionBg(this.last);
                        return this;
                    },
                    prototype: $.Jcrop.component.Selection.prototype
                });
                
                $('#logo').Jcrop({
                    // Change default Selection component for new selections
                    selectionComponent: CircleSel,
                    applyFilters: [ 'constrain', 'extent', 'backoff', 'ratio', 'round' ],
                    aspectRatio: 1,
                    setSelect: initCoords(input),
                    handles: [ 'n','s','e','w' ],
                    borders: [ ],
                    onSelect: updateLogoCoords

                },function(){
                    this.container.addClass('jcrop-circle-demo');
                    interface_load(this);
                    cropLogo = this;
                });
            }
        }

        function interface_load(obj){
          cb = obj;
          // Add in a custom shading element...
          cb.container.prepend($('<div />').addClass('custom-shade'));
        }

        // save coordinate cropper
        function updateCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        // save coordinate cropper
        function updateLogoCoords(c) {
            $('#x-logo').val(c.x);
            $('#y-logo').val(c.y);
            $('#w-logo').val(c.w);
            $('#h-logo').val(c.h);
        };

        //init coordinates and give initial value to coordinate input
        function initCoords(input)
        {
            if(input == "cover"){
                $('#x').val(0);
                $('#y').val(0);
                $('#w').val(500);
                $('#h').val(100);

                return [
                    $('#x').val(),
                    $('#y').val(),
                    $('#w').val(),
                    $('#h').val(),  
                ];
            } else if (input == "logo"){
                $('#x-logo').val(0);
                $('#y-logo').val(0);
                $('#w-logo').val(200);
                $('#h-logo').val(200);
                
                return [
                    $('#x-logo').val(),
                    $('#y-logo').val(),
                    $('#w-logo').val(),
                    $('#h-logo').val(),  
                ];
            }
        };

        //Restart Jcrop
        function refreshJcrop(input) 
        {
            if(input == "cover"){
                $('#cover').one('load', function(){
                    if(cropCover != undefined){
                        cropCover.destroy();
                    }
                    initJcrop(input);
                });
            } else if(input == "logo"){
                $('#logo').one('load', function(){
                    if(cropLogo != undefined){
                        cropLogo.destroy();
                    }
                    initJcrop(input);
                });
            }
           
        };

    </script>
@endsection

<style type="text/css">.jcrop-circle-demo .jcrop-box {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  border: 1px rgba(255, 255, 255) solid;
  border-radius: 50%;
  /*-webkit-box-shadow: 1px 1px 26px #000000;
  -moz-box-shadow: 1px 1px 26px #000000;
  box-shadow: 1px 1px 26px #000000;*/
  overflow: hidden;
}
.jcrop-circle-demo .jcrop-box:focus {
  outline: none;
}
.custom-shade {
  position: absolute;
  top: 0px;
  left: 0px;
  background-color: black;
  opacity: 0.4;
  width: 100%;
  height: 100%;
}
</style>