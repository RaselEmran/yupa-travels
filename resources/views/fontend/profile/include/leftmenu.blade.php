<div class="col-md-3">
	<div class="row">
		<div class="col-md-12 user-profile-container">
			<div class="col-md-12" style="padding-bottom: 10px;">
				<center>
				<span>

				<img src="{{asset(isset(Auth::user()->image)?'/storage/profile/user/'.Auth::user()->image:'fontend/images/profile-pic.png')}}" class="profile-pic-dash" /></span>
				</center>
			</div>
			<div class="col-md-12" style="padding-bottom: 10px;">
				<center><label class="user-name" id="full_name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</label></center>
			</div>
			<!--<div class="col-md-12" style="padding-bottom: 20px;">
				<center><a class="edit-profile">Edit Profile</a></center>
			</div>-->
			<div class="col-md-6 offpadding right-border" style="padding-bottom: 5px;">
				<center>
				<div class="user-status">Active</div>
				<div class="lbl-status">Status</div>
				</center>
			</div>
			<div class="col-md-6 offpadding" style="padding-bottom: 5px;">
				<center>
				<div class="user-join-date">{{ auth()->user()->created_at->format('d M Y') }}</div>
				<div class="lbl-joined">Joined</div>
				</center>
			</div>
			<div class="col-md-12">
				<div class="dash-menu"><a href="{{ route('booking-result') }}" class="menu-a {{Request::is('booking-result') ?'active':''}}"><i class="fa fa-clipboard icon-menu"></i><span class="menu-space">Package Booking</span></a></div>
			</div>
			{{-- <div class="col-md-12">
				<div class="dash-menu"><a href="" class="menu-a"><i class="far fa-comment-dots icon-menu"></i><span class="menu-space">Review</span></a></div>
			</div> --}}

			<div class="col-md-12">
				<div class="dash-menu"><a href="{{ route('user-travel-kit') }}" class="menu-a {{Request::is('user-travel-kit') ?'active':''}}"><i class="glyphicon-flash"></i><span class="menu-space">Travel Kit</span></a></div>
			</div>

			<div class="col-md-12">
				<div class="dash-menu"><a href="{{ route('hotel.booking_list') }}" class="menu-a {{Request::is('hotel-booking-list') ?'active':''}}"><i class="far fa-hotel icon-menu"></i><span class="menu-space">Hotel Booking</span></a></div>
			</div>
			<div class="col-md-12">
				<div class="dash-menu"><a href="{{ route('wishlist') }}" class="menu-a {{Request::is('wishlist') ?'active':''}}"><i class="far fa-heart icon-menu"></i><span class="menu-space">Wishlist</span></a></div>
			</div>
			<div class="col-md-12">
				
				@php
				$auth =Auth::user()->id;
					$check =App\Host::where('user_id',$auth)->first();
				@endphp
				@if ($check && $check->status =='approve')
				<div class="dash-menu">
				<a href="{{ route('add-hotel') }}" class="menu-a {{Request::is('add-hotel') ?'active':''}}"><i class="far fa-heart icon-menu"></i><span class="menu-space">Add Hotel</span></a>
				</div>

				<div class="dash-menu">
				<a href="{{ route('hotel-list') }}" class="menu-a {{Request::is('hotel-list') ?'active':''}}"><i class="far fa-github"></i><span class="menu-space"> Hotel List</span></a>
				</div>

				@else
				<div class="dash-menu">
				<a href="{{ route('host') }}" class="menu-a {{Request::is('apply-host') ?'active':''}}"><i class="far fa-bar-chart"></i><span class="menu-space">Apply as Host</span></a>
				</div>

				@endif
				
			</div>
			<div class="col-md-12 dash-logout-border">
				<div class="dash-menu"><a href="{{ route('logout') }}" class="menu-a" id="logout"><i class="fas fa-sign-out-alt icon-logout"></i><span class="menu-space">Log out</span></a></div>
			</div>
		</div>
	</div>
</div>