@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/navbar.css') }}" rel="stylesheet">
{{-- <link href="{{ elixir('css/brand-home.css') }}" rel="stylesheet"> --}}
@endsection

@section('navbar')
  @include('navbar')
@endsection

@section('content')
    <div class="container">
        <div class="feature-flex">

            <!-- display picture -->
            <?php $path = Auth::guard()->user()->logo; ?>
            <img src="{{ asset("storage/$path") }}">

            {!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}

            {!! Form::file('logo') !!}
            {!! Form::button('Save Logo', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
            {!! Form::close() !!}
            
        </div> 
        <div class="feature-flex">
            @include('sections.album')
        </div>
        <div class="feature-flex">
            @include('sections.article')
        </div>
        <div class="feature-flex">
            @include('sections.detail')
        </div>
        <div class="feature-flex">
            @include('sections.map')
        </div>
        <div class="feature-flex">
            @include('sections.music')
        </div>
        <div class="feature-flex">
            @include('sections.promotion-list')
        </div>
        <div class="feature-flex">
            @include('sections.video')
        </div>
    </div>
@endsection
