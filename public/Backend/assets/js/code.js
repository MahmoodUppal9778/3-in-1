
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var id =   $(this).attr("data-id");
        var deleteURL = 'http://127.0.0.1:8000/posts/'+id; 
//        var ula = {{url('/checker')}};
//        alert(ula);
//        alert(id);  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: deleteURL,
        type: 'DELETE', // replaced from put
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
        success: function (response)
        {
//            console.log(response);
//window.location.reload();
        $('#postData'+id).remove();
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )



  // see the reponse sent
        },
        error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error

       }
    });
//        window.location.reload();
                    }
                  }); 


    });

  });





