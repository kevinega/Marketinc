@section('page-style')
{{-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> --}}
@endsection

<img id="promo-pict">

{!! Form::open(['id' => 'form-promotion', 'enctype' => 'multipart/form-data']) !!}
	{{ csrf_field() }}
	{!! Form::file('promo', ['id' => 'promo-upload', 'name' => 'promo']) !!}
	</br>
	{!! Form::label('title', 'Title', ['class' => 'label']) !!}
	{!! Form::text('title', null, ['id' => 'title']) !!}
	</br>
	{!! Form::label('desc', 'Description', ['class' => 'label']) !!}
	{!! Form::text('description', null, ['id' => 'description']) !!}
	</br>
	{!! Form::label('promotionType', 'Promotion type', ['class' => 'label']) !!}
	{!! Form::select('promotionType', ['special' => 'Special', 'happy-hour'=> 'Happy hour', 'event' => 'Event', 'free' => 'Free', 'discount' => 'Discount', 'new' => 'New'], null, ['id'=> 'promotionType','placeholder' => 'Select promo type']) !!}
	</br>
	{!! Form::label('disc_value', 'Discount value', ['id' => 'disc_value']) !!}
	{!! Form::text('disc_value', null, ['id' => 'disc-value']) !!}
	</br>
	{!! Form::label('start_date', 'Start date', ['class' => 'label']) !!}
	{!! Form::date('start_date', '', ['id' => 'start_date']) !!}
	</br>
	{!! Form::label('end_date', 'End date', ['class' => 'label']) !!}
	{!! Form::date('end_date', '') !!}
</br>
	{!! Form::label('valid_days', 'Valid days', ['class' => 'label']) !!}
</br>
	{!! Form::label('mon', 'Monday', ['class' => 'label']) !!}
	{!! Form::checkbox('mon', 'Monday') !!}
	</br>
	{!! Form::label('tue', 'Tuesday', ['class' => 'label']) !!}
	{!! Form::checkbox('tue', 'Tuesday') !!}
	</br>
	{!! Form::label('wed', 'Wednesday', ['class' => 'label']) !!}
	{!! Form::checkbox('wed', 'Wednesday') !!}
	</br>
	{!! Form::label('thu', 'Thursday', ['class' => 'label']) !!}
	{!! Form::checkbox('thu', 'Thursday') !!}
	</br>
	{!! Form::label('fri', 'Friday', ['class' => 'label']) !!}
	{!! Form::checkbox('fri', 'Friday') !!}
	</br>
	{!! Form::label('sat', 'Saturday', ['class' => 'label']) !!}
	{!! Form::checkbox('sat', 'Saturday') !!}
	</br>
	{!! Form::label('sun', 'Sunday', ['class' => 'label']) !!}
	{!! Form::checkbox('sun', 'Sunday') !!}
</br>
	{!! Form::button('Save Promotion', ['type' => 'submit']) !!}
{!! Form::close() !!}

@section('page-script')
{{-- <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
	$(function() {
    	$( "#datepicker" ).datepicker();
  	});
</script> --}}

<script>
   	$(document).ready(function(){
            // bismilla validation
            $("#form-promotion").submit(function(e) {
            	e.preventDefault();
            	var formPromo = new FormData(this);

            	$.ajax({
            		url: '/brand/upload/promotionValidator',
            		type: 'post',
            		dataType: 'json',
            		data: formPromo,
            		contentType: false,
            		processData: false,
            		cache: false,
            		success: function(data) {
            			if(data.status == "errors") {
            				console.log("error");

            			} else if(data.status == "success") {
            				location.reload();
            			}
            		},
            		error: function(data) {
            			console.log("error");
            		}
            	});
            });
        });

    </script>
@endsection