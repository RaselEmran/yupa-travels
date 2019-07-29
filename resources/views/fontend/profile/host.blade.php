@extends('fontend.profile.profile',['info'=>$info->image])
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
@endpush
@section('procontent')
<div class="col-md-8 booking-order-details">
	<div class="container-fluid">
		<form action="{{ route('host.store') }}" method="post" id="host" enctype="multipart/form-data">

			<div class="row">
				<div class="col-md-12">
					<div><label>Your Name</label></div>
					<div style="padding-bottom: 10px;"><input type="text" id="name" class="form-control form-control100" name="name" placeholder="Please enter Your name"   value=""/></div>
				</div>
				<div class="col-md-12">
					<div><label>Your Identity </label></div>
					<div style="padding-bottom: 10px;"><input type="text" id="identity" class="form-control form-control100" name="identity" placeholder="Please enter identity"   value=""/></div>
				</div>

				<div class="col-md-12">
					<div><label>Your Address</label></div>
					<div style="padding-bottom: 10px;"><input type="text" id="address" class="form-control form-control100" name="address" placeholder="Please enter Address"   value=""/></div>
				</div>

				<div class="col-md-12">
					<div><label>Email Address</label></div>
					<div style="padding-bottom: 10px;"><input type="text" id="email" class="form-control form-control100" name="email" placeholder="Please enter Email"   value=""/></div>
				</div>

				<div class="col-md-12">
					<div><label>Contact Number</label></div>
					<div style="padding-bottom: 10px;"><input type="text" id="phone" class="form-control form-control100" name="phone" placeholder="Please enter Contact"   value=""/></div>
				</div>


				<div class="col-md-12">
					<div><label>Id card/Driving Lincense</label></div>
					<div style="padding-bottom: 10px;">
					<input type="file" name="file" id="file">
					</div>
				</div>
		
				</div>
				<button type="submit" class="btn btn-info">
				Apply As Host 
				</button>

			</form>
	
		</div>
	</div>
	@endsection
	@push('js')
	<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
	<script>
	    $('.select').select2();
		//profile pic.....
		$(document).on('submit', '#host', function(e) {
	    e.preventDefault();
	    $(".ajax_error").remove();
	    var formData = new FormData($(this)[0]);
   		var url = $(this).attr('action');
	    $.ajax({
	      	  method:'POST',
              url: url,
              data:formData,
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
	        success: function(data) {
	            if (data.success) {
	            	if(data.status == 'danger'){
                    toastr.warning(data.message);
                  }
	                else{
	                toastr.success(data.message);
	                 setTimeout(function(){

                      window.location.href=data.goto;
                      },2500);
	                }
	            }
	             else {
	                const errors = data.message
	                    // console.log(errors)
	                var i = 0;
	                $.each(errors, function(key, value) {
	                    const first_item = Object.keys(errors)[i]
	                    const message = errors[first_item][0]
	                    $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
	                    toastr.error(value);
	                    i++;
	                });
	            }
	        },
	        error: function(data) {
	            var jsonValue = $.parseJSON(data.responseText);
	            toastr.error(jsonValue.message);

	        }
	    });
	});
</script>
@endpush