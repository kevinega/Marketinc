@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/brand-home.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/Jcrop.min.css') }}" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ asset('js/Jcrop.min.js') }}"></script> --}}
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')       
    <div class="container-fluid"> 
        <div class="feature-photo">
            <!-- display picture -->
            <img id="cover-uploaded" class="cover">

            @if ($errors->has('cover'))
            <div class="error-label">
                <i class="material-icons alert-danger">clear</i>
                {!! $errors->first('cover', '<span class="alert-danger">:message</span>') !!}
            </div>
            @endif

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
                                @include('jcrop')
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
@endsection

@section('page-script')
    <script>
        <?php 
        $pathCover = "storage/".Auth::guard()->user()->cover; 
        if($pathCover == "storage/"){
            $pathCover = "img/default-cover.png";
        }
        ?>

        $(document).ready(function(){
            document.getElementById("cover-uploaded").src = '{{ asset("$pathCover") }}';
        });
    </script>
@endsection