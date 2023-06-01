@extends('index')
@section('admin')
<!-- jquery -->




    <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
      
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">

    <!--
                          <a class="btn btn-info p-2 mx-2" href="">Export to PDF</a>
    -->
                      </ol>
                          <!-- Add Model modal -->



                  </div>


     <h4 class="page-title">Email Setting</h4>
              </div>
          </div>
      </div>     
      <!-- end page title --> 
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-6">
                         <div class="card-body">
                          <p>
@php
    $emailSetting = \App\Models\EmailSetting::latest()->first();
    $counter = \App\Models\EmailSetting::all()->count();
@endphp
      @if(!($counter==0))                            
                          <div class="mb-2">

                            <span>
                              SMTP Host = {{$emailSetting->smtpHost}}
                            </span>

                          </div>
                          
                          <div class="mb-2">

                            <span>
                              SMTP Username = {{$emailSetting->email}}
                            </span>

                          </div>

                          <div class="mb-2">

                            <span class="password">
                              SMTP Password =                  
                             <input type="password" id="pw" class="hiddenPassword" style="border-width:0px;
                               border:none;"  value=" {{$emailSetting->password}}" readonly />
                            </span>
                            </span>

                          </div>  
                            
                          <div class="mb-3">
                            <span>
                              Type = {{$emailSetting->type}};
                            </span>  
                          </div>  
                          <div class="mb-3">
                            <span>
                              Port = {{$emailSetting->port}};
                            </span>  
                          </div> 
                        <div class="form-check "> 
                          <label class="form-check-label" for="type">Click to Hide Edit Settings
                          </label>

                          <input type="radio" name="type" class="form-check-input" value="single" checked="checked" />
                        </div>                          
      @endif                     
                          </p>
                  <div id="add-email-setting">        
                          {{ Form::open(array('url' => 'email/smtp')) }}
                          
                          <div class="mb-3">

                           {{  Form::label('smtp', 'Smtp Host: ', ['class' => 'form-label'])  }}
                           {{  Form::text('smtp', $emailSetting->smtpHost ?? 'Enter Smtp Host', array('class' => 'form-control'))  }} 
                           </div>  
                          <div class="mb-3">

                           {{  Form::label('email', 'Email: ', ['class' => 'form-label'])  }}
                           {{  Form::text('email', $emailSetting->email ?? 'Enter Email' , array('class' => 'form-control'))  }} 
                          </div>  
                          <div class="mb-3">

                           {{  Form::label('password', 'Email Password: ', ['class' => 'form-label'])  }}
                           {{  Form::password('password', array('class' => 'form-control'))  }} 
                          </div>  
                          <div class="mb-3">
                            {{Form::select('type', array(
                                'Smtp Type' => array('tls' => 'TLS'),
                                'Smtp Type2' => array('ssl' => 'SSL'),
                            ))}}                            
                          </div>  
                          <div class="mb-3">

                           {{  Form::label('port', 'Port: ', ['class' => 'form-label'])  }}
                           {{  Form::number('port',$emailSetting->port ?? '587', array('class' => 'form-control'))  }} 
                          </div>  


                            {{Form::submit('Save!')}}
                          {{ Form::close() }}
                        </div>
                       </div> 
                      </div>
                        <div class="col-md-6">
                          <div class="card-body">
                            
              <div class="mb-3" id="smtpData">

                <form action="{{route('test')}}" method="POST" enctype="multipart/form-data" name="sendMessage" id="sendMessage">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Send Email Using PHPMailer</h4>
                        </div>
 
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="emailRecipient" class="form-label">Email To </label>
                                <input type="email" name="emailRecipient" id="emailRecipient" class="form-control" placeholder="Mail To">
                            </div>
 
                            <div class="mb-3">
                                <label for="emailSubject" class="form-label">Subject </label>
                                <input type="text" name="emailSubject" id="emailSubject" class="form-control" placeholder="Mail Subject">
                            </div>
 
                            <div class="mb-3">
                                <label for="emailBody" class="form-label">Message </label>
                                <textarea name="emailBody" id="emailBody" class="form-control" placeholder="Mail Body"></textarea>
                            </div>
 
                            <div class="mb-3">
                                <label for="emailAttachments" class="form-label">Attachment(s) </label>
                                <input type="file" name="emailAttachments[]" multiple="multiple" id="emailAttachments" class="form-control">
                            </div>
                        </div>
 
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Send Email </button>
                        </div>
                    </div>
                </form>                                
              </div>
                         </div>
                    </div>

                  </div> <!-- end card body-->
              </div> <!-- end card -->
          </div><!-- end col-->
      </div>
      <!-- end row-->

      
  </div> <!-- container -->

  </div> <!-- content -->


<!--Script function is use to keep edited id and transfer it to modal body and then from modal body to controller-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
--
  <!-- Script -->

<script src="{{ asset('backend/assets/js/jquery-3.7.0.js')}}"></script>
<script src="{{ asset('backend/assets/js/emailSetting.js')}}"></script>
<script src="{{ asset('backend/assets/js/radiobutton.js')}}"></script>




<!-- Script -->
</html>
@endsection