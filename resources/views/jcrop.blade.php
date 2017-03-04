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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#cover').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#uploaded").change(function(){
        readURL(this);
        $('#cover').style.display = 'block';
        $('#cover').style.width = '100%';
    });

    // initiate cropper
    $('#cover').Jcrop({
        boxWidth: 1550, 
        boxHeight: 300,
        setSelect: [ 175, 100, 400, 300 ],
        aspectRatio: 5 / 1,
        onSelect: updateCoords
    });

    // save coordinate cropper
    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };
</script>