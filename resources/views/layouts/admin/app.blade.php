<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset("vendor/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="{{ URL::asset("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset("css/sb-admin.css") }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ URL::asset("http://code.jquery.com/jquery-1.12.4.min.js") }}"></script>
    <script type="text/javascript" src="{{ URL::asset("chart.js") }}"></script>
    <link href="{{ URL::asset("loading/dist/loading.min.css") }}" rel="stylesheet" type="text/css">
    
    @yield('head')
    @yield('title_page')

</head>

<?php
     if(session('api_token', '') == null || session('role', 0) != 3) {
           echo "<script language='javascript'>
                 alert('Bạn chưa đăng nhập, vui lòng đăng nhập lại');
              location.href='/Login';
              </script>";
      } 
 ?> 

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    @include('layouts.admin.header')
    <div class="content-wrapper" style="margin-right: none;" >     
    @yield('content')
     <!-- Logout Modal -->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logutModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="logout">Đăng xuất?</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
        <div class="modal-body">
           Bạn chắc chắn muốn đăng xuất?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="/Logout">Đăng xuất</a>
        </div>
      </div>
    </div>
   </div>
    @include('layouts.admin.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset("vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ URL::asset("vendor/popper/popper.min.js") }}"></script>
    <script src="{{ URL::asset("vendor/bootstrap/js/bootstrap.min.js") }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset("vendor/jquery-easing/jquery.easing.min.js") }}"></script>
    <script src="{{ URL::asset("vendor/chart.js/Chart.min.js") }}"></script>
    <script src="{{ URL::asset("vendor/datatables/jquery.dataTables.js") }}"></script>
    <script src="{{ URL::asset("vendor/datatables/dataTables.bootstrap4.js") }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset("admin/js/sb-admin.min.js") }}"></script>
    <script src="{{ URL::asset("admin/js/sb-admin.js") }}"></script>
    <!-- <script src="{{ URL::asset("user/js/teacher.js") }}"></script> -->

    <script src="{{ URL::asset("http://code.jquery.com/jquery-1.12.4.min.js") }}"></script>
    <script src="{{ URL::asset("loading/dist/jquery.loading.min.js") }}"></script>

    @yield('script')
</body>
</html>
