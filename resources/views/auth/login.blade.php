<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> -->
    <link href="loading/dist/loading.min.css" rel="stylesheet" type="text/css">
  
    <link href="{{ URL::asset("/validation/css/cmxform.css") }}" rel="stylesheet">
    <script src="{{ URL::asset("/validation/lib/jquery.js") }}"></script>
    
    <script src="{{ URL::asset("/validation/dist/jquery.validate.js") }}"></script>
    <script src="{{ URL::asset("/user/js/validate.js") }}"></script>
    
  </head>

  <?php
     if(session('api_token', '') != null ) {
          $role = session('role', 0);
  
          switch ($role) {
              case 1 :
                  echo "<script language='javascript'>
                    location.href='/Students';
                  </script>";
                  break;
              case 2: 
                   echo "<script language='javascript'>
                      location.href='/Teachers';
                    </script>";
                  break;
              case 3:
                   echo "<script language='javascript'>
                    location.href='/Admins';
                   </script>";
                    break;
              default:
                   break;
          }
      } 
 ?> 

  @if (session('error'))
    <script language='javascript'>
      alert(" {{ session('error') }}");
    </script>
  @endif 

  @if (session('registerStatus'))
    <script language='javascript'>
      alert(" {{ session('registerStatus') }}");
    </script>
  @endif 
  <body>
	<div class="login">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Chào mừng!</span></span></span></h1>
		</div>
		<div class="login-box animated fadeInUp" style="width:400px; margin-bottom:20px;">
			<div class="box-header">
				<h2>Đăng Nhập</h2>
			</div>
			<form method = "POST" action="PerformLogin" id="formLogin">
      {!! csrf_field() !!}
        <div class="form-group " style="padding:10px;">
          <label for="inputEmail"><b>Email</b></label>
          <input type="email" name = "email" class="form-control" id="email"  placeholder="Nhập email" >
        </div>
        <div class="form-group"  style="padding:10px;">
          <label for="inputPassword"><b>Mật khẩu</b></label>
          <input type="password" name = "password" class="form-control" id="password" placeholder="Nhập mật khẩu" >
         
        </div>
        <input type="submit" class="btn " value="Đăng nhập" >
      </form>

      <a class="d-block small mt-3" href="Reset">Quên mật khẩu</a>
			<a class="d-block small mt-3" href="Register">Đăng ký tài khoản</a>
      
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>
 
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="loading/dist/jquery.loading.min.js"></script>

  <script src="{{ URL::asset("validation/lib/jquery.js") }}"></script>
  <script src="{{ URL::asset("validation/dist/jquery.validate.js") }}"></script>
    
  </body>
</html>

