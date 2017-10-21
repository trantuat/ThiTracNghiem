@extends('layouts.student.app')
@section('title_page')
<title>Thông tin cá nhân</title>
@endsection

@section('head')
<link href="{{ URL::asset("/validation/css/cmxform.css") }}" rel="stylesheet">
<script src="{{ URL::asset("/validation/lib/jquery.js") }}"></script>
<script src="{{ URL::asset("/validation/dist/jquery.validate.js") }}"></script>

@endsection
@section('content')
@if (isset($error)) 
<div class='alert alert-danger alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong>Lỗi</strong> {{$error}}
</div>
@endif

@if (isset($status))
<div class='alert alert-warning alert-dismissible fade show'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
<strong>Lỗi: </strong>{{$status}}
</div>
@endif

@if (isset($update))
@if ($update == 1) 
    <div class='alert alert-success alert-dismissible fade show'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong>Thành công</strong> Cập nhật thành công
    </div>
@endif
@endif

<div class= "container-fluid" style="margin-top:20px;">
<div class="row">

<div class="col-sm-12">
<h4 ><i class="fa fa-user"></i> Thông tin tài khoản  </h4>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="row" >
            <div class="col-lg-2">
                <div class="col-lg-12 " style="margin-left:20px;">
                    <img class="rounded-circle img-fluid d-block mx-auto" src="../img/user.jpg" alt="">
                    <center><h6><b><?php echo session('username', ''); ?></b></h6>
                </div>
            </div>
            <div class="col-lg-6">
                <form method="POST" class="cmxform" action="Profile" name="formUpdateProfile" id="formUpdateProfile" enctype="multipart/form-data" >
                {!! csrf_field() !!}

                <fieldset>
                <legend style = "padding-left: 20px;">Thông tin cá nhân</legend>
                <div class="row" style=" padding-left: 20px; padding-right: 20px;">
                    <div class="col-lg-6 padding-top-25">
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label for="username"><b>Username <span class="text-danger">*</span></b></label>
                            <input type="text" name = "username" class="form-control" id="username"  placeholder="Nhập username" value = "{{ $errors->has('username') ? old('username') : $data['username'] }}" >
                            <!-- <span class="text-danger">{{ $errors->first('username') }}</span> -->
                        </div>
                        <div class="form-group ">
                            <label for="fullname"><b>Ngày sinh</b></label>
                            <input type="date" data-format="Y-m-d" name = "birthday" class="form-control" id="birthday"  value = "{{ $data['info']['day_of_birth'] }}" >
                            <!-- <span class="text-danger">{{ $errors->first('birthday') }}</span> -->
                        </div>
          
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address"><b>Địa chỉ</b></label>
                            <input type="text" name = "address" class="form-control" id="address"  placeholder="Nhập địa chỉ" value = "{{ $errors->has('address') ? old('address') : $data['info']['address'] }}" >
                            <!-- <span class="text-danger">{{ $errors->first('address') }}</span> -->
                        </div>
        
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="email"><b>Số điện thoại</b></label>
                            <input type="text" name = "phone" class="form-control" id="phone"  value = "{{ $errors->has('phone') ? old('phone') : $data['info']['phone'] }}" >
                        <!-- <span class="text-danger">{{ $errors->first('phone') }}</span> -->
                      </div>
                    </div>
                    <div class="col-lg-6 padding-top-25">
                        <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                            <label for="fullname"><b>Tên đầy đủ <span class="text-danger">*</span></b></label>
                            <input type="text" name = "fullname" class="form-control" id="fullname"  placeholder="Nhập tên đầy đủ" value = "{{ $errors->has('fullname') ? old('fullname') : $data['info']['fullname'] }}" >
                            <!-- <span class="text-danger">{{ $errors->first('fullname') }}</span> -->
                        </div>
      
                        <div class="form-group">
                            <label for="gender"><b>Giới tính</b></label>
                            <select name="gender" id="gender" class="form-control" value = "{{ $data['info']['gender']}}">
                            <option value="Nam" <?php echo $data['info']['gender'] == 'Nam'? 'selected="selected"' : '';?> >Nam</option>
                            <option value="Nữ" <?php echo $data['info']['gender'] == 'Nữ'? 'selected="selected"' : '';?>>Nữ</option>
                            </select>
                        </div>
          
                        <div class="form-group">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name = "email" class="form-control" id="email"  value = "{{ $errors->has('email') ? old('email') : $data['email'] }}" readonly>
                        <!-- <span class="text-danger">{{ $errors->first('email') }}</span> -->
                        </div>
          
                    </div>
                    
                   </div>
                   <br>
                <center ><input type = "submit" class="btn btn-success btn-block col-lg-4" id="updateProfile" value = "Cập nhật" > </center>
                <br>    
            </fieldset>    
            </form>
                <br>
            </div>
            <div class="col-lg-4">
                <form  class="cmxform" method="POST" id="formUpdatePassword">
                    {!! csrf_field() !!}
                    <fieldset>
                    <legend style = "padding-left: 20px; width: 200px; ">Mật khẩu:</legend>
                    <div class="input-group">
                        <input type = "hidden" class="form-control" value = '{{json_encode($data)}}' id="data" name="data" />
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-8 padding-top-25">
                            <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
                                <label for="oldPassword"><b>Mật khẩu cũ <span class="text-danger">*</span></b></label>
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword"  >
                            </div>
          
                            <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}">
                                <label for="newPassword"><b>Mật khẩu mới <span class="text-danger">*</span></b></label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword"  >
                            </div>
              
                            <div class="form-group {{ $errors->has('confirmPassword') ? 'has-error' : '' }}">
                                <label for="confirmPassword"><b>Xác nhận mật khẩu mới <span class="text-danger">*</span></b></label>
                                <input type="password" name = "confirmPassword" class="form-control" id="confirmPassword"   >
                            </div>
                            <br>
                            <center><input type="submit" class="btn btn-success btn-block" id="updatePass" value="Lưu mật khẩu"></center>
                            <br>
                            <!-- <center><button class="btn btn-success btn-block col-lg-5" id="updatePass" >Lưu mật khẩu</button></center> -->
                        </div> 

</fieldset>
                    </div>

                </form>
            </div>
        </div>
    </div>
        

</div>
</div>
</div>
@endsection