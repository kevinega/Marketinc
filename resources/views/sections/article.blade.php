<div id='articles'><h2>Articles</h2></div>
<div>
		{!! Form::open(['url' => 'brand/article/create', 'method' => 'POST']) !!}

        {!! Form::label('url', 'Paste or write the link (URL) of the article: ') !!}</br>
        {!! Form::text('url', null, ['id' => 'urlKu', 'class' => 'form-control', 'placeholder' => 'ex: http://www.facebook.com or https://www.facebook.com']) !!}
        </br>

        {!! Form::label('title', 'Title: ') !!}</br>
        {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Original title will be used if this field is left empty']) !!}</br>
        {!! Form::label('author', 'Author name: ') !!}</br>

        {!! Form::text('author', null, ['id' => 'author', 'class' => 'form-control', 'placeholder' => 'Original author name will be used if this field is left empty']) !!}</br>

        {!! Form::label('description', 'Article\'s description: ') !!}</br>
        {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Original Description name will be used if this field is left empty']) !!}</br>

        {!! Form::button('Submit Article', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

        {!! Form::close() !!}
</div>