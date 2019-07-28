@extends('admin.layouts.master')
@section('pageTitle') profile @endsection
@section('page-header')
 <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Profile</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Admin Profile
                    </h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
              <div class="panel-body">
                <form action="{{ route('admin.profile.update') }}" method="post" id="profile_up">
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                            <label>Email Address:</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="{{$admin->email}}">

                    </div>
                  </div>

                    <div class="col-md-12">
                    <div class="form-group">
                            <label>User Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="User Name" value="{{$admin->name}}">

                    </div>
                  </div>
              </div>

                <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update Profile<i class="icon-arrow-right14 position-right"></i></button>
             
                </div>
             </form>
          </div>

             <div class="panel-body">
                <form action="{{ route('admin.password') }}" id="pass_change" method="post">
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                            <label>New Password:</label>
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                    </div>
                  </div>

                    <div class="col-md-12">
                    <div class="form-group">
                            <label>Confirm Password:</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    </div>
                  </div>
              </div>
                <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update Password<i class="icon-arrow-right14 position-right"></i></button>
                
                </div>
             </form>
          </div>
    </div>
                

@endsection
@push('js')
<script>
 $(document).on('submit','#profile_up', function(e){
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
              success: function(data){
             // console.log(data);
                     if (data.success) {
                        new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: data.status
                       }).show();
                    
                      setTimeout(function(){

                      window.location.href=data.goto;
                      },2500);

                    }

                     else {
                            const errors = data.message
                                console.log(errors)
                            var i = 0;
                            $.each(errors, function(key, value) {
                                const first_item = Object.keys(errors)[i]
                                const message = errors[first_item][0]
                                $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                              new Noty({
                                    theme: 'limitless',
                                    layout: 'topRight',
                                    type: 'alert',
                                    timeout: 2500,
                                    text: value,
                                    type: 'error'
                                }).show();
                                i++;
                            });
                       $('.select').select2();
                       $('#submit').show();
                       $('#submiting').hide();
                        }
               },
                error: function(data) {
                        var jsonValue = $.parseJSON(data.responseText);
                        //console.log(jsonValue.Message);
                      new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: jsonValue.message,
                        type: 'danger'
                       }).show();
                        $('.select').select2();
                         $('#submit').show();
                         $('#submiting').hide();
                    }

            });
  });

 //password
  $(document).on('submit','#pass_change', function(e){
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
              success: function(data){
             // console.log(data);
                     if (data.success) {
                        new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: data.status
                       }).show();
                    
                      setTimeout(function(){

                      window.location.href=data.goto;
                      },2500);

                    }

                     else {
                            const errors = data.message
                                console.log(errors)
                            var i = 0;
                            $.each(errors, function(key, value) {
                                const first_item = Object.keys(errors)[i]
                                const message = errors[first_item][0]
                                $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                              new Noty({
                                    theme: 'limitless',
                                    layout: 'topRight',
                                    type: 'alert',
                                    timeout: 2500,
                                    text: value,
                                    type: 'error'
                                }).show();
                                i++;
                            });
                       $('.select').select2();
                       $('#submit').show();
                       $('#submiting').hide();
                        }
               },
                error: function(data) {
                        var jsonValue = $.parseJSON(data.responseText);
                        //console.log(jsonValue.Message);
                      new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: jsonValue.message,
                        type: 'danger'
                       }).show();
                        $('.select').select2();
                         $('#submit').show();
                         $('#submiting').hide();
                    }

            });
  });
</script>
@endpush