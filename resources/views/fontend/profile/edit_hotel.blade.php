@extends('fontend.profile.profile')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
@endpush
@section('procontent')
<div class="col-md-8 booking-order-details">
	<div class="container-fluid">
	    <form role="form" action="{{ route('hotel.update') }}" method="post" enctype="multipart/form-data" id="edithotel">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hotel Name: *</label>
                        <input type="hidden" name="id" value="{{ $hotel->id }}">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Hotel Name" value="{{ $hotel->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Entire Place: *</label>
                        <input type="text" name="entire_place" id="entire_place" class="form-control" placeholder="Entire Place" value="{{ $hotel->entire_place }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Price: * (Per Night)</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $hotel->price }}">
                    </div>
                </div>
              
            </div>
            <div class="row">
                <h4>Amenity</h4>
                @forelse($amenities as $amenity)
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="amenity[]" value="{{ $amenity->id }}"
                            @foreach($hotel->amenities as $hotel_amenity)
                            @if ($hotel_amenity->amenity_id == $amenity->id)
                            checked
                            @endif
                            @endforeach
                            >
                            {{ $amenity->name }}
                        </label>
                    </div>
                </div>
                @empty
                <h3>You Don't Have any amenity. Please add some <a href="{{ route('admin.amenity.create') }}">Amenity</a> for Hotel. </h3>
                @endforelse
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Photo </label>
                        <input type="file" name="photo" id="photo" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Banner </label>
                        <input type="file" name="banner" id="banner" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Room Details:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="room_details" id="room_details" placeholder="Room Details" style="resize: none;">{{ $hotel->room_details }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Allow / Not Allow:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="allow" id="allow" style="resize: none;">{{ $hotel->allow }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cancelation Policy:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="policy" id="policy"  style="resize: none;">{{ $hotel->policy }} </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Location(IFrame):</label>
                        <textarea rows="5" cols="5" class="form-control " name="map" id="map" style="resize: none;">{{ $hotel->map }} </textarea>
                           <small style="color:red"><a href="https://www.embedgooglemap.net/"target="_blank">click here </a> copy iframe code and paste it</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4>SEO Information</h4>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meta Title:</label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="{{ $hotel->meta_title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meta Keywords:</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placehoder="Meta Keywords" value="{{ $hotel->meta_keywords }}" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Meta Description:</label>
                        <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;">{{ $hotel->meta_description }} </textarea>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update Hotel<i class="icon-arrow-right14 position-right"></i></button>
                <button type="button" class="btn btn-link" id="submiting" style="display: none;">Processing <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
            </div>
        </form>
	
		</div>
	</div>
	@endsection
	@push('js')
	<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
	<script>
	    $('.select').select2();
		//profile pic.....
		$(document).on('submit', '#edithotel', function(e) {
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