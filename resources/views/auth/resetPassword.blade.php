<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quên mật khẩu</title>

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
    <script src="{{ URL::asset("/user/js/auth.js") }}"></script>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
  </head>

 
  <body>
	<div class="login">
		<div class="login-box animated fadeInUp" style="width:400px; margin-bottom:20px;">
			<div class="box-header">
				<h2>Quên mật khẩu</h2>
			</div>

      
    
        <div class="form-group " style="padding:10px;">
            <div id = "notice"></div>
          <label for="inputEmail"><b>Nhập email reset password</b></label>
          <input type="email" name = "email" id = "email" class="form-control" id="email"  placeholder="Nhập email" >
        </div>

         <input type="submit" class="btn" id = "sendCode" value="Đặt lại mật khẩu" >
<br>
		<a class="d-block small mt-3" href="Login">Quay lại đăng nhập</a>
		</div>
	</div>
</body>
<script>

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

