@extends('fontend.layouts.master')
@section('pageTitle') sign up @endsection
@push('css')

@endpush
@section('page-header')
<!-- 		<img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>
				<div class="centered3 titleimg9">
					<h2>Sign up with YuPa</h2>
				</div> -->
<div class="bg2 overlay" style="background-image: url(https://yupa.asia/public/fontend/images/bg8.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h2><strong>Sign up with YuPa</strong></h2>
                <!-- <p>Start your new adventure here</p> -->
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection

@section('content')


<div class="row">
			<div id="content6">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4 borderimg1">
							<center>
							<div class="border-option flt-right">
								<img src="{{asset('fontend/images/sign-up-1.jpg')}}" class="op-img"/>
								<div class="row">
									<div class="col-md-12 titleimg10">Guest</div>
									<div class="col-md-12 desc1"><p>Your data will never be collected</p></div>
									<div class="col-md-12 price1"><a href="{{route('home.index', ['sign_up' => 'guest'])}}" class="btn btn-info">Start now</a></div>
								</div>
							</div>
							</center>
						</div>
						<div class="col-md-4 borderimg1">
							<center>
							<div class="border-option">
								<img src="{{asset('fontend/images/sign-up-2.jpg')}}" class="op-img"/>
								<div class="row">
									<div class="col-md-12 titleimg10">Frequent Traveller</div>
									<div class="col-md-12 desc1"><p>Welcome you with better discounts</p></div>
									<div class="col-md-12 price1">
									<a href="{{ route('sign-up', ['sign_up' => 'traveller']) }}" class="btn btn-info">Create account</a>
									</div>
								</div>
							</div>
							</center>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>


@endsection

@push('css')

@endpush