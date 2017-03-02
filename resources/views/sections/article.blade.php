<div id='title'> Title </div>
<img id='image' src='' height="50%" width="50%"></img></br>
<a id='url' href=''> URL </a>
<div id='author'> Author </div>
<div id='published_on'> PublishDate </div>


<div>
		{!! Form::open(['url' => 'brand/article/create', 'method' => 'POST']) !!}

        {!! Form::label('title', 'Title: ') !!}</br>
        {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Original title will be used if this field is left empty']) !!}</br>

        {!! Form::label('url', 'Paste or write the link (URL) of the article: ') !!}</br>
      	{!! Form::text('url', null, ['id' => 'url', 'class' => 'form-control', 'placeholder' => 'ex: http://www.facebook.com or https://www.facebook.com']) !!}
      	</br>

      	{!! Form::label('author', 'Author name: ') !!}</br>
        {!! Form::text('author', null, ['id' => 'author', 'class' => 'form-control', 'placeholder' => 'Original author name will be used if this field is left empty']) !!}</br>


      	{!! Form::label('published_on', 'Publish date (Original publish date will be used if this field is left empty): ') !!}</br>
        {!! Form::date('published_on', null, ['id' => 'published_on', 'class' => 'form-control', 'placeholder' => 'Original publish date will be used if this field is left empty']) !!}</br>

        {!! Form::button('Submit Article', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

        {!! Form::close() !!}
</div>
<script>
$(document).ready(
        function() {
$.ajax({ 
            url: '/brand/embedArticle', 
            type: 'get', 
            dataType: 'json', 
            //contentType: "application/json", 
            success: function(data) { 
                    console.log('sukses'); 
                    console.log(data);
                    // console.log(data.message.title); 
                    // document.getElementById('title').innerHTML = "<b>" + data.message.title + "</b>";
                    // document.getElementById('image').src = data.message.image;
                    // document.getElementById('url').href = data.message.url;
                    // document.getElementById('author').innerHTML = data.message.author;
                    // document.getElementById('published_on').innerHTML = data.message.published_on;


                  } ,error:function(e) { 
                    console.log('gagal'); 
                  } 
            }); 
});
</script>