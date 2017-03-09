<div id='articles'><h2>Articles</h2></div>
<div>
		{!! Form::open(['url' => 'brand/article/create', 'method' => 'POST']) !!}

        {!! Form::label('title', 'Title: ') !!}</br>
        {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Original title will be used if this field is left empty']) !!}</br>

        {!! Form::label('url', 'Paste or write the link (URL) of the article: ') !!}</br>
      	{!! Form::text('url', null, ['id' => 'urlKu', 'class' => 'form-control', 'placeholder' => 'ex: http://www.facebook.com or https://www.facebook.com']) !!}
      	</br>

      	{!! Form::label('author', 'Author name: ') !!}</br>
        {!! Form::text('author', null, ['id' => 'author', 'class' => 'form-control', 'placeholder' => 'Original author name will be used if this field is left empty']) !!}</br>


      	{!! Form::label('published_on', 'Publish date (Original publish date will be used if this field is left empty): ') !!}</br>
        {!! Form::date('published_on', null, ['id' => 'published_on', 'class' => 'form-control', 'placeholder' => 'Original publish date will be used if this field is left empty']) !!}</br>

        {!! Form::button('Submit Article', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

        {!! Form::close() !!}
</div>
@section('page-script')
<script>
  $(document).ready(
    function() {

    $('#urlKu').change(function(){
      $.ajax({
        url: '/brand/article/extractUrl',
        type: 'post',
        dataType: 'json',
        data: {
          "_token": "{{ csrf_token() }}",
          "url": $('#urlKu').val()
        }, success: function(data){
          console.log(data.message.published_on)
         $('#title').val(data.message.title);
         $('#author').val(data.message.author);
         $('#published_on').val(data.message.published_on);
        }, error: function(e){
        },
      });
    });


      $.ajax({ 
        url: '/brand/embedArticle', 
        type: 'get', 
        dataType: 'json', 
            //contentType: "application/json", 
            success: function(data) { 
              if(data.status == 'success'){
              var articles = data.message;
              var htmlText = '';
              console.log(data.message[0].title);
              for ( var key in articles ) {
                htmlText += '<div class="">';
                htmlText += '<p class=""> Title: ' + data.message[key].title + '</p>';
                htmlText += '<img class="" src=' + data.message[key].image + '></img></br>';
                htmlText += '<a class="" href=' + data.message[key].url + '>'+ data.message[key].url +'</a>';
                htmlText += '<p class=""> Created by: ' + data.message[key].author + '</p>';
                htmlText += '<p class=""> Publish Date: ' + data.message[key].published_on + '</p>';
                htmlText += '</div>';
              }

              document.getElementById('articles').innerHTML += htmlText;
            }else{
              var htmlText = data.message;
              document.getElementById('articles').innerHTML += htmlText;
            }
            } ,error:function(e) { 
             console.log('failed'); 
           } 
         }); 
    });
</script>
@endsection