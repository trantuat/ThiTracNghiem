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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset("vendor/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">
  
    <!-- Plugin CSS -->
    <link href="{{ URL::asset("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset("user/css/sb-admin.css") }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link href="{{ URL::asset("css/teacher.css") }}" rel="stylesheet"> -->

    <link href="{{ URL::asset("user/css/carousel.css") }} " rel="stylesheet">
    @yield('head')
    @yield('title_page')

</head>
@if (session('error_create_quiz'))
    <script language='javascript'>
      alert(" {{ session('error_create_quiz') }}");
    </script>
  @endif 
<?php
     if(session('api_token', '') == null ||  session('role', 0) != 1) {
           echo "<script language='javascript'>
                 alert('Bạn chưa đăng nhập, vui lòng đăng nhập lại');
              location.href='/Login';
              </script>";
      }
 ?> 

<body class="fixed-nav sticky-footer " id="page-top">
    @include('layouts.student.header')
    @yield('carousel')
    <div class="content-wrapper" >     
    @yield('content')
    </div>
    </div>
    @include('layouts.student.footer')
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
    <script src="{{ URL::asset("user/js/sb-admin.js") }}"></script>
    <script src="{{ URL::asset("user/js/student.js") }}"></script>
    <script src="{{ URL::asset("user/js/validate.js") }}"></script>
    <script src="{{ URL::asset("http://code.jquery.com/jquery-1.12.4.min.js") }}"></script>

    <script src="{{ URL::asset("validation/lib/jquery.js") }}"></script>
    <script src="{{ URL::asset("validation/dist/jquery.validate.js") }}"></script>
    <!-- <script src="{{ URL::asset("validation/css/cmxform.css") }}"></script> -->
    @yield('script')
</body>
</html>
