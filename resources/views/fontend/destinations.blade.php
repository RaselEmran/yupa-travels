@extends('fontend.layouts.master')

@section('pageTitle') Satys For You @endsection

@push('css')

@endpush

@section('page-header')
<!--
<img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>

<div class="centered3 titleimg9">

    <h2>Stays For You</h2>

</div> -->
<div class="bg2 overlay" style="background-image: url(https://yupa.asia/public/fontend/images/bg8.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h2><strong>Stays for you</strong></h2>
                <!-- <p>Start your new adventure here</p> -->
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>


@endsection

@section('content')
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
						@foreach ($data['destination'] as $allpack)

				<div class="col-lg-3 col-md-3 col-sm-4 borderimg1">
					<a href="{{ route('destination.show',$allpack->id) }}">
						<img src="{{asset('/storage/destination/photo/'.$allpack->photo)}}" class="img1" width="100%" height="auto" />
						<div class="titleimg1">{{$allpack->name}}</div>
					</a>
				</div>
				@endforeach

				</div>
				<div class="row">

                {!! $data['destination']->links() !!}

            </div>

			</div>
		</div>
	</section>

	@endsection

@push('js')

@endpush