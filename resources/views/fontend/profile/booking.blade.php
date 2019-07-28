@extends('fontend.profile.profile')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('procontent')

	<div class="col-md-8 booking-order-details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <span class="vertical-box"></span><span style="font-size: 24px!important; font-weight: bold; ">Bookings</span>
                        <p class="grey-txt">This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
                    </div>
                </div>
                <div class="row">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Package Name</th>
                                <th>Destination Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                         @foreach ($userpackege as $allpack)
                         <tr>
                             <td>		<img src="{{asset('/storage/packege/photo/'.$allpack->packege->photo)}}"
					 class="img1" width="205px" height="135" /></td>
                             <td>{{$allpack->packege->name}}</td>
                             <td>{{$allpack->packege->destination->name}}</td>
                             <td>
                                 <a class="btn btn-info" href="{{ route('experience-booking-details',$allpack->id) }}">
                                     Details
                                 </a>
                             </td>
                         </tr>
                         
                         @endforeach
                    </table>
                 
                   {{ $userpackege->links() }}
                </div>
            </div>
    </div>
		

@endsection

@push('js')
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
$('.select').select2();
</script>

<script>
 @if(session('message'))
    toastr.success('{{session('message')}}');
 @endif
</script>
@endpush