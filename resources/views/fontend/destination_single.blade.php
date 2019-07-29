@extends('fontend.layouts.master')
@section('pageTitle') {{ $destination->name }} @endsection
@push('css')
<link href="{{asset('backend/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('page-header')
<img src="{{asset('/storage/destination/banner/'.$destination->banner)}}" class="bg3"/ width="1351px" height="368px">
@endsection
@section('content')
<div class="container row">
	<div class="col-md-12">
		<button class="btn btn-gallery view-destination-img"><img src="{{ asset('fontend/images/image-gallery.png') }}" height="16px" width="16px" /><span style="padding-left: 5px;">View Photos</span></button>
	</div>
</div>
</div>
</div>
<br>
<div class="row">
<div id="content12">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				{{-- <div class="col-md-12">
					<span class="state">State > </span><span class="area">Balik Pulau</span>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>{{ $destination->name }}</h3>
				</div>
			</div>

			@if($destination->heading)
			<div class="row">
				<div class="col-md-12">
					<span class="entires text-justiy">{{ $destination->heading }}</span>
				</div>
			</div>
			<br>
			@endif
			<br>
			@if($destination->short_description)
			<div class="row">
				<div class="col-md-12">
					<h4 class="destination-sub-titles">Description</h4>
				</div>
				<div class="col-md-12">
					<div class="room-detail-desc text-justify">
						{!! $destination->short_description !!}
					</div>
				</div>
			</div>
			<br>
			@endif

			@if($destination->introduction)
			<div class="row">
				<div class="col-md-12">
					<h4 class="destination-sub-titles">Introduction</h4>
				</div>
				<div class="col-md-12 text-justify">
					{!! $destination->introduction !!}
				</div>
			</div>
			<br>
			@endif
			@if($destination->experience)
			<div class="row">
				<div class="col-md-12">
					<h4 class="destination-sub-titles">Experience</h4>
				</div>
				<div class="col-md-12 text-justify">
					{!! $destination->experience !!}
				</div>
			</div>
			<br>
			@endif
			@if($destination->hotel)
			<div class="row">
				<div class="col-md-12">
					<h4 class="destination-sub-titles">Hotel</h4>
				</div>
				<div class="col-md-12 text-justify">
					{!! $destination->hotel !!}
				</div>
			</div>
			<br>
			@endif
			@if($destination->transportation)
			<div class="row">
				<div class="col-md-12">
					<h4 class="destination-sub-titles">Transportation</h4>
				</div>
				<div class="col-md-12 text-justify">
					{!! $destination->transportation !!}
				</div>
			</div>
			@endif
			@if($destination->culture)
			<div class="row">
				<div class="col-md-12">
					<h4 class="destination-sub-titles">Culture</h4>
				</div>
				<div class="col-md-12 text-justify">
					{!! $destination->culture !!}
				</div>
			</div>
			@endif
		</div>
		</div>
	</div>
</div>
</div>
@endsection
@push('js')
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('fontend/js/destination-booking.js')}}"></script>
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
@endpush