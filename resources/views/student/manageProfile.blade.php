@extends('layouts.student.app')
@section('title_page')
<title>Thông tin cá nhân</title>
@endsection
@section('content')


@if (isset($error)) 
    <script language='javascript'>
      alert(" {{ $error }}");
    </script>
@endif

@if (isset($status))
    <script language='javascript'>
      alert(" {{ $status }}");
    </script>
@endif

@if (isset($update))
  @if ($update == 1) 
    <script language='javascript'>
      alert(" {{ "Cập nhật dữ liệu thành công." }}");
    </script>
  @endif
@endif

<div class= "container-fluid" style="margin-top:20px;">
  <div class="row">
      <div class="col-lg-5" >
        <div class="col-lg-5" style="margin: 0 auto; width: 100%;display: block;" >
            <img class="rounded-circle img-fluid d-block mx-auto" src="../img/user.jpg" alt="">
            <br>
            <center><h6><?php echo session('username', ''); ?></h6></center>
        </div>
        <br>
    
        <div class="col-lg-8" style="margin: 0 auto; width: 100%;display: block;">
        
          <div class="list-group" >
            <div class="input-group" >
              <button type="button" class="list-group-item list-group-item-action active " id="showAccount" onClick="showProfile()">
                <i class="fa fa-user"></i> Cập nhật tài khoản
                </button>
            </div>
            <br>
            <div class="input-group">
              <button type="button" class="list-group-item list-group-item-action " id="showPass" onClick="changePassword()">
                <i class="fa fa-snowflake-o"></i> Cập nhật mật khẩu
                </button>
            </div>
            <br>
          </div>
        </div>
      </div>

      <!--Form update account-->
      <div class="col-lg-6" style="margin-top:20px;" >
          <div id="showProfile">
          <h4 style="color:red;"><i class="fa fa-user"></i> Thông tin tài khoản  </h4>
          <br>
          <form method="POST" class="form-horizontal" action="Profile" name="formUpdateProfile" id="formUpdateProfile"enctype="multipart/form-data" >
          {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
              <label for="username"><b>Username</b></label>
              <input type="text" name = "username" class="form-control" id="username"  placeholder="Nhập username" value = "{{ $errors->has('username') ? old('username') : $data['username'] }}" >
              <span class="text-danger">{{ $errors->first('username') }}</span>
            </div>

            <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
              <label for="fullname"><b>Tên đầy đủ</b></label>
              <input type="text" name = "fullname" class="form-control" id="fullname"  placeholder="Nhập tên đầy đủ" value = "{{ $errors->has('fullname') ? old('fullname') : $data['info']['fullname'] }}" >
              <span class="text-danger">{{ $errors->first('fullname') }}</span>
            </div>

            <div class="form-group ">
              <label for="fullname"><b>Ngày sinh</b></label>
              <input type="date" data-format="Y-m-d" name = "birthday" class="form-control" id="birthday"  value = "{{ $data['info']['day_of_birth'] }}" >
              <!-- <span class="text-danger">{{ $errors->first('birthday') }}</span> -->
            </div>


            <div class="form-group">
              <label for="gender"><b>Giới tính</b></label>
              <select name="gender" id="gender" class="form-control" value = "{{ $data['info']['gender']}}">
                <option value="Nam" <?php echo $data['info']['gender'] == 'Nam'? 'selected="selected"' : '';?> >Nam</option>
                <option value="Nữ" <?php echo $data['info']['gender'] == 'Nữ'? 'selected="selected"' : '';?>>Nữ</option>
              </select>
            </div>

            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
              <label for="address"><b>Địa chỉ</b></label>
              <input type="text" name = "address" class="form-control" id="address"  placeholder="Nhập địa chỉ" value = "{{ $errors->has('address') ? old('address') : $data['info']['address'] }}" >
              <span class="text-danger">{{ $errors->first('address') }}</span>
            </div>

            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <input type="text" name = "email" class="form-control" id="email"  value = "{{ $errors->has('email') ? old('email') : $data['email'] }}" readonly>
              <!-- <span class="text-danger">{{ $errors->first('email') }}</span> -->
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
              <label for="email"><b>Số điện thoại</b></label>
              <input type="text" name = "phone" class="form-control" id="phone"  value = "{{ $errors->has('phone') ? old('phone') : $data['info']['phone'] }}" >
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>

            <div class="col-sm-5">
              <!-- <input type = "submit" class="btn btn-success btn-block" id="updateProfile" value = "Cập nhật"> -->
              <button class="btn btn-success btn-block" id="updateProfile" >Cập nhật </button>
            </div>
          </form>
        </div>

      <!-- Form pass -->
        <div id="change">
          <h4 style="color:red;"><i class="fa fa-snowflake-o"></i> Mật khẩu </h4>
          <br>
          <form action="UpdatePassword" class="form-horizontal" method="POST">
          {!! csrf_field() !!}
            <div class="input-group">
              <input type = "hidden" class="form-control" value = '{{json_encode($data)}}' id="data" name="data" />
            </div>

            <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
              <label for="oldPassword"><b>Mật khẩu cũ</b></label>
              <input type="password" class="form-control" id="oldPassword" name="oldPassword"  >
              <span class="text-danger">{{ $errors->first('oldPassword') }}</span>
            </div>

            <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}">
              <label for="newPassword"><b>Mật khẩu mới</b></label>
              <input type="password" class="form-control" id="newPassword" name="newPassword"  >
              <span class="text-danger">{{ $errors->first('newPassword') }}</span>
            </div>

            <div class="form-group {{ $errors->has('confirmPassword') ? 'has-error' : '' }}">
              <label for="confirmPassword"><b>Xác nhận mật khẩu mới</b></label>
              <input type="password" name = "confirmPassword" class="form-control" id="confirmPassword"   >
              <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
            </div>

            <div class="col-sm-5">
              <!-- <input type = "submit" class="btn btn-success btn-block" id="updatePass" value="Lưu mật khẩu"></button> -->
              <button class="btn btn-success btn-block" id="updatePass" >Lưu mật khẩu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
@endsection
<script type="text/javascript">

  window.onload = function() {

    document.getElementById("showProfile").style.display = "block";
    document.getElementById("change").style.display = "none";

  };

  function showProfile() {
      document.getElementById("change").style.display = "none";
      document.getElementById("showProfile").style.display = "block";
      document.getElementById("showPass").classList.remove("active");
      document.getElementById("showAccount").className += " active"; 
    } 
    
function changePassword(){
      document.getElementById("showProfile").style.display = "none";
      document.getElementById("change").style.display = "block";
      document.getElementById("showPass").className += " active"; 
      document.getElementById("showAccount").classList.remove("active");
}

</script>
