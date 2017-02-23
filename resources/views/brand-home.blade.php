@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/brand-home.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('navbar')
@endsection

@section('content')
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
        @php 
            $path = Auth::guard()->user()->logo;
        @endphp
        <img src="{{ asset("storage/$path") }}" class="photo-360">
         @if ($errors->has('logo'))
            <div class="error-label">
                <i class="material-icons alert-danger">clear</i>
                {!! $errors->first('logo', '<span class="alert-danger">:message</span>') !!}
            </div>
        @endif

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-logo-modal">
          <i class="material-icons">add_a_photo</i>
        </button>

        <!-- Modal -->
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

    <div class="container">
        <div class="feature">
            @include('sections.album')
        </div>
        <div class="feature">
            @include('sections.article')
        </div>
        <div class="feature">
            @include('sections.detail')
        </div>
        <div class="feature">
            @include('sections.map')
        </div>
        <div class="feature">
            @include('sections.music')
        </div>
        <div class="feature">
            @include('sections.promotion-list')
        </div>
        <div class="feature">
            @include('sections.video')
        </div>
    </div>
@endsection
