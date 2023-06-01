<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Easy POS System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico')}}">
        <!-- Plugins css -->
        <link href="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- Bootstrap css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-grid.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-grid.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-grid.rtl.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('backend/assets/css/bootstrap-reboot.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-reboot.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('backend/assets/css/bootstrap-reboot.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-reboot.rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('backend/assets/css/bootstrap-utilities.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-utilities.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('backend/assets/css/bootstrap-utilities.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap-utilities.rtl.min.css')}}" rel="stylesheet" type="text/css" />
 

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- icons -->
        <link href="{{ asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />


        <!-- Head js -->
        <script src="{{ asset('backend/assets/js/head.js')}}"></script>


        <!-- third party css - DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />


        <!-- third party css end - DataTables-->

        <!-- CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

        <!-- JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
        
    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->

            @include('body.header')

            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
  
            @include('body.sidebar')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                @yield('admin')

                <!-- Footer Start -->
                @include('body.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
   
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('backend/assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{ asset('backend/assets/js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('backend/assets/js/bootstrap.bundle.js')}}"></script>

        <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{ asset('backend/assets/js/bootstrap.esm.js')}}"></script>

        <script src="{{ asset('backend/assets/js/bootstrap.esm.min.js')}}"></script>

        <script src="{{ asset('backend/assets/js/bootstrap.js')}}"></script>        

        <script src="{{ asset('backend/assets/js/bootstrap.min.js')}}"></script>

        <!-- third party js - DataTables -->
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <!-- third party js DataTables ends -->

        <!-- Datatables init -->
        <script src="{{ asset('backend/assets/js/pages/datatables.init.js')}}"></script>

        <!-- DataTables End-->





<!--/*=========================Add Sweetalert =======================*/-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('Backend/assets/js/code.js') }}"></script>

<!--JAVA SCRIPT VALIDATION-->

<script src="{{ asset('Backend/assets/js/validate.min.js') }}"></script>

   <!-- toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @elseif(Session::has('info'))
                toastr.info('{{ Session::get('info') }}');
            @elseif(Session::has('warning'))
                toastr.warning('{{ Session::get('warning') }}');

            @endif
        });

    </script>





    </body>
</html>