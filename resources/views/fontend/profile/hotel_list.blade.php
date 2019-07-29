@extends('fontend.profile.profile')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
@endpush
@section('procontent')
<div class="col-md-8 booking-order-details">
	<div class="container-fluid">
    <table class="table table-border">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Image</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
  
            @foreach ($hotel as $element)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><img class="img-responsive img-thumbnail" src="{{asset('/storage/hotel/photo/'.$element->photo)}}" alt="" width="120px"></td>
                    <td>{{$element->name}}</td>
                     <td>
                            @if($element->status == 1)
                            <button class="btn btn-xs btn-success">Active</button>
                            @else
                            <button class="btn btn-xs btn-danger">In Active</button>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('hotel.edit',$element->id) }}" class="btn btn-info">Edit</a>
                        </td>
                </tr>
            @endforeach
  
        </tbody>
    </table>
    {{ $hotel->links() }}
	
	</div>
	</div>
	@endsection
	@push('js')
	<script src="{{asset('fontend/js/toastr.min.js')}}"></script>

@endpush