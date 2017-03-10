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
         $('#description').val(data.message.description);
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
              var title='';
              var image='';
              var url='';
              var author='';
              var description='';
              var providerName='';
              var providerUrl='';
              console.log(data.message[0].title);
              for ( var key in articles ) {
                title= data.message[key].title;
                image= data.message[key].image;
                url= data.message[key].url;
                author= data.message[key].author;
                description= data.message[key].description;
                providerName= data.message[key].provider_name;
                providerUrl= data.message[key].provider_url;

                htmlText += '<div class="">';
                htmlText += '<p class=""> Title: ' + title + '</p>';
                htmlText += '<img class="" src=' + image + '></img></br>';
                htmlText += '<a class="" href=' + url + '>'+ url +'</a>';
                htmlText += '<p class=""> Created by: ' + author + '</p>';
                htmlText += '<p class=""> Description: ' + description + '</p>';
                htmlText += '<a class="" href=' + providerUrl + '>' + providerName + '</a>';
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