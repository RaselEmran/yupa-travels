@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')
@endpush
@section('page-header')
<!-- <img src="{{asset('fontend/images/travel-home.jpg')}}" class="bg1"/> -->
<div class="bg1 overlay" style="background-image: url(https://yupa.asia/public/fontend/images/travel-home.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h2><strong>Find your special local experience</strong></h2>
				<p>Start your new adventure here</p>
				<div class="search-bar">
					<form action="{{ route('search') }}" method="get">
					<input type="text" id="search" class="input-field" name="q" placeholder="Search by destination, activity, or interest" />
					<button class="search-btn-icon"><img class="search-bar-icon" src="{{asset('fontend/images/search.png')}}"/></button>
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
<!-- 	<div class="middle-right titleimg">
		<h2><strong>Times To Explore</strong></h2>
		<p class="subtitle">Start your new adventure here</p>
		<div class="search-bar">
			<form action="{{ route('search') }}" method="get">
			<input type="text" id="search" class="input-field" name="q" placeholder="Search by destination, activity, or interest" />
			<button class="search-btn-icon"><img class="search-bar-icon" src="{{asset('fontend/images/search.png')}}"/></button>
			</form>
		</div>
	</div> -->
</div>

@endsection
@section('content')
<div class="row">
	<div id="content2" class="boxes">
		<div class="container">
			<div class="row">
				<div class="col-md-4 box-left-border">
					<h4 class="h41">See the best of the world</h4>
					<p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>
				</div>
				<div class="col-md-4 box-left-border">
					<h4 class="h41">Keep up with your schedule</h4>
					<p class="p1">Get to know when to depart so you won't miss out what you've planned</p>
				</div>
				<div class="col-md-4">
					<h4 class="h41">Find a travel buddy</h4>
					<p class="p1">Get match with a friendly companion to travel together</p>
				</div>
			</div>
		</div>
	</div>
</div>
@if($data['destination']->count() > 0)

		<section>

			<div id="content3">

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<h4><b>Explore The World</b></h4>

						</div>

                        <div class="col-md-10">

							<p class="p1">Discover a different side of these beloved cities</p>

						</div>
						<div class="col-md-2">

							<p class="p1"><a class="views-all-btn flt-right" href="{{ route('destination.index') }}">View All</a></p>

						</div>
						@foreach ($data['destination'] as $allpack)

				<div class="col-lg-3 col-md-3 col-sm-4 borderimg1">
					<a href="{{ route('destination.show',$allpack->id) }}">
						<img src="{{asset('/storage/destination/photo/'.$allpack->photo)}}" class="img1" width="100%" height="auto" />
						<div class="titleimg1">{{$allpack->name}}</div>
					</a>
				</div>
				@endforeach

				</div>

			</div>
		</div>
	</section>
</div>
@endif
@if($data['packege']->count() > 0)
<section>
	<div id="content4">
		<div class="container">
			<div class="row">
				<div class="col-md-12 headercontent">
					<h4><b>Recommended for you</b></h4>
				</div>
				@foreach ($data['packege'] as $recomand)
				<div class="col-lg-3 col-md-3 col-sm-4 borderimg1">
					<a href=" {{ route('experience-booking',$allpack->id) }}">
						<img src="{{asset('/storage/packege/photo/'.$recomand->photo)}}" class="img1 overlay" width="100%" height="auto"/>

						<div class="bottomed titleimg2">{{$recomand->destination->name}}</div>
					</a>
				</div>
				@endforeach

			</div>
		</div>
	</div>
</section>
@endif


@if($data['hotel']->count() > 0)
<section>
	<div id="content6">
		<div class="container">
			<div class="row">
				<div class="col-md-12 headercontent">
					<h4><b>Stays for you</b></h4>
				</div>
				<div class="col-md-10">
					<p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>
				</div>
				<div class="col-md-2">
					<p class="p1"><a class="views-all-btn flt-right" href="{{ route('hotel.index') }}">View All</a></p>
				</div>
				@foreach($data['hotel'] as $hotel)
				<div class="col-md-3 col-sm-4 col-xs-12 borderimg1">

					<div class="darkbg3">
						<a href="{{ route('hotel.show', $hotel->id) }}"><img src="{{asset('/storage/hotel/photo/'.$hotel->photo)}}" class="img3"/></a>
						<div class="row">
							<div class="col-md-12 titleimg4"><a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->name }}</a></div>
							<div class="col-md-6 reviewcontainer">
								<span id="rateYo_{{ $hotel->id }}" class="text-left" style="padding-left: 10px;"></span>
							</div>
							<div class="col-md-6 price1">MYR {{ $hotel->price }}</div>
						</div>
					</div>

				</div>
				@php
				$reviews = $hotel->reviews->where('status', 'approved');
				if($reviews->count()){
					$rating = $reviews->average('rate');
				} else{
					$rating = 0;
				}
				@endphp
				<script>
					$(function () {
					  $("#rateYo_{{ $hotel->id }}").rateYo({
					    rating: {{ $rating }},
					    readOnly: true
					  });
					});
				</script>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif
<section>
	<div id="content7">
		<div class="container">
			<div class="row">
				<div class="col-md-12 headercontent">
					<h4><b>Things you might bring</b></h4>
					<div>
					<p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>
				</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<center>
					<div class="bg3">
						<img src="{{asset('fontend/images/bg3.jpg')}}" class="bg3"/>
						<div class="top-right titleimg5"><p>Promotion</p><p>10%</p></div>
					</div>
					</center>
				</div>
				<div class="col-lg-4 col-md-4">
					<center>
					<div class="bg4">
						<img src="{{asset('fontend/images/bg4.jpg')}}" class="bg4"/>
						<div class="top-left titleimg6"><p>Promotion</p><p>10%</p></div>
					</div>
					</center>
				</div>
				<div class="col-lg-4 col-md-4">
					<center>
					<div class="bg3">
						<img src="{{asset('fontend/images/bg3.jpg')}}" class="bg3"/>
						<div class="top-right titleimg5"><p>Promotion</p><p>10%</p></div>
					</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</section>
@if($data['member']->count() > 0)
<div class="row">
	<div id="content8">
		<div class="container">
			<div class="row">
				<div class="col-md-12 headercontent">
					<center>
					<h4><b>Partnerships</b></h4>
					<p class="p2">Yupa teams up with big names to bring you exclusive promotions</p>
					</center>
				</div>
				<div class="col-md-12 partner-container">
				@foreach ($data['member'] as $allmember)

					<div class="col-md-2">

						<div>

								<img src="{{asset('/storage/member/'.$allmember->photo)}}" width="150px" height="105"" alt="">

						</div>

					</div>
				@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endif

<section>
	<div id="content2" class="boxes blue">
		<div class="container">
			<div class="row">
				<div class="col-md-9 text-left">
					<h2 style="margin: 0; color: #fff; font-weight: 600;">Want to buy somethings to make your trip convenience?</h2>
				</div>
				<div class="col-md-3 text-right">
					<a href="{{ route('travelkit') }}" class="btn default-btn">Buy Now</a>
				</div>

			</div>
		</div>
	</div>
</section>

<!-- <div class="row">
	<div id="content9">
		<div class="whyyupa">
			<div class="bg2">
				<img src="{{asset('fontend/images/bg5.jpg')}}" class="bg5" />
				<center>
				<div class="centered1 titleimg7">WHY YUPA</div>
				<div class="centered2 titleimg8">See why millions of travelers choose to experience the world as part of out strong and secure Yupa community.</div>
				</center>
			</div>
		</div>
	</div>
</div> -->



@endsection
@push('js')

@endpush