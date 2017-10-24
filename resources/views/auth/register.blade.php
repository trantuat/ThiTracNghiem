<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Luyện thi trắc nghiệm</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="{{ URL::asset("/validation/css/cmxform.css") }}" rel="stylesheet">
    <script src="{{ URL::asset("/validation/lib/jquery.js") }}"></script>
    
    <script src="{{ URL::asset("/validation/dist/jquery.validate.js") }}"></script>
    <script src="{{ URL::asset("/user/js/validate.js") }}"></script>

  </head>

  <body class="bg-dark">
  @if (session('error'))
    <script language='javascript'>
      alert(" {{ session('error') }}");
    </script>
  @endif 

    <div class="container">

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Đăng ký tài khoản
        </div>
        <div class="card-body">
          <form method="post" action="PerformRegister" id="formRegister">
          {!! csrf_field() !!}
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 ">
                  <label for="username">Username </label>
                  <span class="text-danger">*</span>
                  <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Nhập username" value="{{old('username')}}" >
                  <!-- <span class="text-danger" >{{ $errors->first('username') }}</span> -->
                </div>
                <div class="col-md-6">
                  <label for="fullname">Tên đầy đủ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="fullname" placeholder="Nhập tên đầy đủ">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="dayOfBirth">Ngày sinh <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" placeholder="08/29/1995" id="dayOfBirth" name="dayOfBirth" >
                </div>
                <div class="col-md-6">
                  <label for="address">Địa chỉ </label>
                  <input type="text" class="form-control" id="address" name="address" aria-describedby="address" placeholder="Nhập địa chỉ">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 ">
                  <label for="email">Email</label>
                  <span class="text-danger">*</span>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Nhập email" value="{{old('email')}}">
                  <!-- <span class="text-danger" >{{ $errors->first('email') }}</span> -->
                </div>
                <div class="col-md-6">
                  <label for="phone">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone" name="phone" aria-describedby="nameHelp" placeholder="Nhập số điện thoại">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 ">
                  <label for="password">Mật khẩu <span class="text-danger">*</span></label>
                  <span class="text-danger">*</span>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                  <!-- <span class="text-danger" >{{ $errors->first('password') }}</span> -->
                </div>
                <div class="col-md-6 ">
                  <label for="confirmPassword ">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                  <span class="text-danger">*</span>
                  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu">
                  <span class="text-danger" >{{ $errors->first('confirmPassword') }}</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 ">
                  <label for="gender ">Giới tính</label>
                  <select name="gender" id="gender" class="form-control" >
                    <option value="Nam"  >Nam</option>
                    <option value="Nữ" >Nữ</option>
                  </select>
                </div>
              <div>
            </div>
            </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                  <label class="col-md-4"><b>Vai trò</b></label>
                  <label class="col-md-4 radio-inline"><input type="radio" name="role" id="1" value  = "1" checked>Học Sinh</label>
                  <label class="col-md-4 radio-inline"><input type="radio" name="role" id="2" value = "2" >Giáo viên</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Đăng ký">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="Login">Đăng nhập</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset("validation/lib/jquery.js") }}"></script>
    <script src="{{ URL::asset("validation/dist/jquery.validate.js") }}"></script>

  </body>

</html>
