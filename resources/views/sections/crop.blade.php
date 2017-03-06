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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ asset('js/Jcrop.min.js') }}"></script>
<script>
    function readURL(input) {
        if (input.files) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#cover').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#uploaded").change(function() {
        readURL(this);
        $('#cover').style.display = 'block';
        $('#cover').style.width = '100%';
    });

    // initiate cropper
    $('#cover').Jcrop({
        boxWidth: 700,
        boxHeight: 700,
        setSelect: initCoords(),
        aspectRatio: 5 / 1,
        onSelect: updateCoords
    });

    //save coordinate cropper
    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    function initCoords() {
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
</script>