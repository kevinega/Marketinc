<html>
<head>
    <title>Laravel and Jcrop</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/Jcrop.min.css') }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{ asset('js/Jcrop.min.js') }}"></script>>
</head>
<body>
    <img id="cover" class="cover">

    <!-- modal -->
{{--         <div class="modal fade" id="upload-cover-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-label">Upload Cover</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> --}}
                        {!! Form::open(['method' => 'post', 'url' => 'brand/upload', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        {!! Form::file('cover', ['id' => 'uploaded', 'class' => 'upload-cover']) !!}
                        {!! Form::hidden('x', '', array('id' => 'x')) !!}
                        {!! Form::hidden('y', '', array('id' => 'y')) !!}
                        {!! Form::hidden('w', '', array('id' => 'w')) !!}
                        {!! Form::hidden('h', '', array('id' => 'h')) !!}
                        {!! Form::button('Save Cover', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
      {{--               </div>
                </div>
            </div>
        </div> --}}
        {{-- </div> --}}

    {{-- <div class="feature-followers">
        <h6>1234 followers</h6>
        <button type="button" class="btn btn-primary btn-follow">Follow</button>
    </div> --}}

    {{-- <div class="container">
        <div class="feature">
            <div class="feature-flex-menu">
                <a href="#promotions"><h5>PROMOTIONS</h5></a>
                <a href="#details"><h5>DETAILS</h5></a>
                <a href="#menu"><h5>MENU</h5></a>
                <a href="#pictures"><h5>PICTURES</h5></a>
                <a href="#review"><h5>REVIEW</h5></a>
                <a href="#branches"><h5>BRANCHES</h5></a>
            </div>
        </div>
        <div class="feature" id="promotions">
            @include('sections.promotion-list')
        </div>
        <div class="feature" id="details">
            @include('sections.detail')
        </div>
        <div class="feature" id="pictures">
            @include('sections.album')
        </div>
        <div class="feature">
            @include('sections.article')
        </div>
        <div class="feature">
            @include('sections.map')
        </div>
        <div class="feature">
            @include('sections.music')
        </div>
        <div class="feature">
            @include('sections.video')
        </div>
    </div> --}}
    {{-- @endsection --}}

    {{-- @section('page-script') --}}
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

        });


        // $(function() {
            $('#cover').Jcrop({
               boxWidth: 1550, 
               boxHeight: 300,
                setSelect: [ 175, 100, 400, 300 ],
                aspectRatio: 5 / 1,
                onSelect: updateCoords
            });
        // });

        function updateCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };


      //   $('.multi-item-carousel').carousel({
      //     interval: false
      // });

      //   $('.multi-item-carousel .carousel-item').each(function(){
      //       var next = $(this).next();
      //       if (!next.length) {
      //           next = $(this).siblings(':first');
      //       }
      //       next.children(':first-child').clone().appendTo($(this));

    // for (var i=0;i<2;i++) {
    //     next=next.next();
    //     if (!next.length) {
    //         next = $(this).siblings(':first');
    //     }

    //     next.children(':first-child').clone().appendTo($(this));
    // }
//     if (next.next().length>0) {
//         next.next().children(':first-child').clone().appendTo($(this));
//     } else {
//         $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
//     }
// });

// // Instantiate the Bootstrap carousel
// $('.multi-item-carousel').carousel({
//   interval: false
// });

// // for every slide in carousel, copy the next slide's item in the slide.
// // Do the same for the next, next item.
// $('.multi-item-carousel .carousel-item').each(function(){
//   var next = $(this).next();

//   if (!next.length) {
//     next = $(this).siblings(':first');
//   }
//   next.children(':first-child').clone().appendTo($(this));

//   if (next.next().length>0) {
//     next.next().children(':first-child').clone().appendTo($(this));
//   } else {
//     $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
//   }
// });
</script>
</body>
</html>