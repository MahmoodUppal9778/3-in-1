@extends('index')
@section('admin')
    
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--
-->

<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- Add Model modal -->

<!--
                    <a class="btn btn-info p-2 mx-2" href="">Export to PDF</a>
-->
                </ol>
                    <!-- Add Model modal -->



            </div>


<h4 class="page-title">All Todos</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif                                       
  <table id="todos" class="table dt-responsive data-table nowrap w-100">
      <thead>
          <tr>
              <th>User Id</th>
              <th>Id</th>
              <th>Title</th>
              <th>Completed</th>
          </tr>
      </thead>
  
  
      <tbody>
      </tbody>
      </table>

                  </div> <!-- end card body-->
              </div> <!-- end card -->
          </div><!-- end col-->
      </div>
      <!-- end row-->

      
  </div> <!-- container -->

  </div> <!-- content -->


<!--_______________________________________________________________________-->



<!--_____________________________________________________________________-->
<!--Script function is use to keep edited id and transfer it to modal body and then from modal body to controller-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
 /*         $(document).ready(function() {

            // Data Display Code
            var fetchTodos = 'http://127.0.0.1:8000/jsonplaceholderdata';
            var table = $('#todos').DataTable( {
                ajax: fetchTodos,
                columns: [
                    { "data": "userId" },
                    { "data": "id" },
                    { "data": "title" },
                    { "data": "completed" },
                ]
            } );*/
var fetchTodos = 'http://127.0.0.1:8000/jsonplaceholderdata';
$(document).ready(function() {
 $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('json.fetch') }}",
        columns: [
            {data: 'userId', name: 'userId'},
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'completed', name: 'completed', orderable: false, searchable: false},
        ]
    });
    
  });

});
</script>
  <!-- Script -->
</html>
@endsection