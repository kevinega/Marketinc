<img id="cover" class="cover">

<!-- form cropper -->
{!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!}
{{ csrf_field() }}
{!! Form::file('cover', ['id' => 'uploaded', 'class' => 'upload-cover']) !!}
{!! Form::hidden('x', '', array('id' => 'x')) !!}
{!! Form::hidden('y', '', array('id' => 'y')) !!}
{!! Form::hidden('w', '', array('id' => 'w')) !!}
{!! Form::hidden('h', '', array('id' => 'h')) !!}
{!! Form::button('Save Cover', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="{{ asset('js/Jcrop.min.js') }}"></script>
<script>
var crop;
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#cover').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            //BIKIN PAGE(?)
            "Your Browser doesn't support FileReader API"
        }
    }

    // changes after new input image
    $("#uploaded").change(function(){
        readURL(this);
        refreshJcrop();
        $('#cover').style.display = 'block';
        $('#cover').style.width = '100%';
    });


    // initiate cropper
    function initJcrop(){
        $('#cover').Jcrop({
            boxWidth: 700,
            boxHeight: 700,
            setSelect: initCoords(),
            aspectRatio: 5 / 1,
            onSelect: updateCoords
        },function () { 
            crop = this; 
        });
    }

    // save coordinate cropper
    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    //init coordinates and give initial value to coordinate input
    function initCoords()
    {
        $('#x').val(0);
        $('#y').val(0);
        $('#w').val(300);
        $('#h').val(300);

         return [
           $('#x').val(),
           $('#y').val(),
           $('#w').val(),
           $('#h').val(),  
          ];
    };

    //Restart Jcrop
    function refreshJcrop() 
    {
        $('#cover').one('load', function(){
            if(crop != undefined){
                crop.destroy();
            }
            initJcrop();
        });
    };
</script>