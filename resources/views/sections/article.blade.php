<div>
  <h2>Articles</h2>
  <button class="btn btn-primary btn-sm"><i class="fa fa-plus fa-fw"></i>Add article</button>
</div>
<div id='articles'>

</div>
<div>
  {!! Form::open(['url' => 'brand/article/create', 'method' => 'POST']) !!}
  {!! Form::label('url', 'URL') !!}
  {!! Form::text('url', null, ['id' => 'urlKu', 'class' => 'form-control', 'placeholder' => 'ex: http://www.facebook.com or https://www.facebook.com']) !!}
  {!! Form::label('title', 'Title') !!}
  {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Original title will be used if this field is left empty']) !!}
  {!! Form::label('author', 'Author') !!}
  {!! Form::text('author', null, ['id' => 'author', 'class' => 'form-control', 'placeholder' => 'Original author name will be used if this field is left empty']) !!}
  {!! Form::label('description', 'Description') !!}
  {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Original Description name will be used if this field is left empty']) !!}
  {!! Form::button('Submit article', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
  {!! Form::close() !!}
</div>