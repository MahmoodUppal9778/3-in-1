@extends('index')
@section('admin')
    
<meta name="csrf-token" content="{{ csrf_token() }}">



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
                    <button type="button" class="btn btn-primary p-2 mx-2" data-bs-toggle="modal" data-bs-target="#add-post">Add Post</button>

                    <button type="button" class="btn btn-info p-2" data-bs-toggle="modal" data-bs-target="#send-mail">Send a Post to all Users </button>

<!--
                    <a class="btn btn-info p-2 mx-2" href="">Export to PDF</a>
-->
                </ol>
                    <!-- Add Model modal -->



            </div>


<h4 class="page-title">All Posts</h4>
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
  <table id="basic-datatable" class="table dt-responsive nowrap w-100">
      <thead>
          <tr>
              <th>Sl</th>
              <th>Title</th>
              <th>Body</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
      </thead>
  
  
      <tbody>
      	@foreach($dataPost as $key => $item )
          <tr id="postData{{$item->id}}">
              <td>{{ $key+1 }}</td>
              <td>{{ $item->title}}</td>
              <td>{{$item->body}}</td>
              <td>
                  <img src="{{ asset($item->featured_image) }}" style="width:50px; height: 40px;">
              </td>

              <td>
<!--The user who created the post only allow to edit and delete  it-->                
              @if($item->user_id == Auth::id())

                <button type="button" id="passingID{{$item->id}}" class="btn btn-primary passingID"  data-bs-toggle="modal" data-bs-target="#edit-post" data-id="{{$item->id}}" data-title="{{$item->title}}"
                data-body="{{$item->body}}" data-img-name="{{$item->featured_image}}" title="Edit"><i class='fa fa-edit'></i></button> 

                                                                   	              

                <a href="" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete" title="Delete" data-id="{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
              @else
                Associated person can edit and delete the post
              @endif                
                                  </td>
                              </tr>
                              @endforeach    
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

                                        <!-- Signup modal content -->
<div id="add-post" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <form class="px-3" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" required="" placeholder="Post Title">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea id="body" name="body" class="form-control @error('body') is-invalid @enderror"></textarea>

                    </div>

                    <div class="form-group mb-3">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                <input type="file" id="feature_image" name="feature_image"  class="form-control">
                               <img id="show_image" src="{{  url('upload/noimage.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                >

                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-danger" href="{{ route('posts.index') }}"><i class="fa fa-btn fa-back"></i>Cancel</a>

                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="edit-post" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
              <center><h3>Edit Section</h3></center>
                <form class="px-3" method="post" action="{{ route('posts.update',1) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" class="form-label" id="editpostid" name="editpostid">
                    <div class="mb-3">
                        <label for="edittitle" class="form-label">Title</label>
                        <input class="form-control @error('edittitle') is-invalid @enderror" type="text" id="edittitle" name="edittitle" required="" placeholder="Post Title">
                    </div>
                    <div class="mb-3">
                        <label for="editbody" class="form-label">Body</label>
                        <textarea id="editbody" name="editbody" class="form-control @error('editbody') is-invalid @enderror"></textarea>

                    </div>

                    <div class="form-group mb-3">
                                <label for="edit_featured_image" class="form-label">Featured Image</label>
                                <input type="file" id="edit_feature_image" name="edit_feature_image"  class="form-control">
                               <img id="edit_show_image" src="{{  url('upload/noimage.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                >

                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" id="update_data" type="submit">Save</button>
                        <a class="btn btn-danger" href="{{ route('posts.index') }}"><i class="fa fa-caret-left"></i>Cancel</a>
                        
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="send-mail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

               <form action="{{route('send-email')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
 
 
                        <div class="card-header">
                            <h4 class="card-title">Send Email Using PHPMailer</h4>
                        </div>
                    </div>  
                        <div class="card-body">
                            <div class="form-group">
                                <label for="emailRecipient">Email To </label>
                                <p>All Users</p>
                            </div>    
@php
  $post = \App\Models\Post::where('api_insertion', 0)->get();
@endphp
                          <div class="form-group">
                            <label for="post" class="form-label">Select a Post to send</label>
                             <select class="form-select  id="post" name="post" required>
                                <option selected disabled>Select Post</option>
                             @foreach($post as  $item)    
                                <option value="{{$item->id}}" {{old('post')==$item->id ? 'selected' : ''}}>{{$item->title}}</option>
                             @endforeach  
                            </select>
                          </div>
                          <br>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Send Email </button>
                        <a class="btn btn-danger" href="{{ route('posts.index') }}"><i class="fa fa-caret-left"></i>Cancel</a>

                        </div>
                    </div>
                </form>
            </div><!-- /.modal body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--_____________________________________________________________________-->
<!--Script function is use to keep edited id and transfer it to modal body and then from modal body to controller--> 
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="{{ asset('backend/assets/js/jquery-3.7.0.js')}}"></script>

  <!-- Script -->

<script src="{{ asset('backend/assets/js/image.js')}}"></script>
<script src="{{ asset('backend/assets/js/editpost.js')}}"></script>

<script type="text/javascript">
    $(".passingID").click(function () {
    var ids = $(this).attr('data-id');
    var title = $(this).attr('data-title');
    var body = $(this).attr('data-body');

    var feature_image = $(this).attr('data-img-name');
    $("#editpostid").val( ids );
    $("#edittitle").val( title );
    $("#editbody").val( body );
    var base_url = {!! json_encode(url('/')) !!};
    var img_url = base_url+'/'+feature_image;
    $("#edit_show_image").attr("src", img_url); 

    });</script>
<!-- Script -->


</html>

@endsection