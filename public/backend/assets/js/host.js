$("#approve").click(function(){
	 var url = $(this).data('url');
	     $.ajax({
              method:'GET',
              url: url,
              dataType:'json',
             success: function(data){

             	  if (data.success) {
                        new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: data.status
                       }).show();
                      $('#submit').show();
                      $('#submiting').hide();
                      setTimeout(function(){

                      window.location.href='';
                      },2500);

                    }
              
             }
         });
});

//reject
$(document).on('click', '#delete_item', function(e) {
            e.preventDefault();
            var row = $(this).data('id');
            var url = $(this).data('url');
            //console.log(row, url);
           swal({
            title: "Are you sure?",
            text: "Reject This Applicant",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, Reject it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                    if (data.success) {
                 swal({
                    title: "Deleted!",
                    text: "Your are rejected",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
                     setTimeout(function(){

                      window.location.href='';
                      },2500);
                        }
                 if (data.error) {
                       new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: 'warning'
                       }).show();
                 }       
                      }
                  });  
             
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your imaginary Person is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
        });
