@extends('layouts.masters.main')
@section('page-content')
    <div class="container">
      @include('layouts.partials.nav')
      @include('layouts.partials.form_errors')
      {!! Form::open(['id' => 'post-route-form']) !!}

	      {!! Form::label('title', 'Title') !!}
	      {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Title', 'required']) !!}
	      </br>

	      {!! Form::label('body', 'Body') !!}
	      {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Brand Description', 'required']) !!}
	      
	      </br>

	      {!! Form::label('promo', 'Promo') !!}
	      {!! Form::text('promo', null, ['id' => 'promo', 'class' => 'form-control', 'placeholder' => 'Your Promo', 'required']) !!}

	      </br>

	      {!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

      {!! Form::close() !!}


    </div>
@stop
