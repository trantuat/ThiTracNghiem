@extends('layouts.teacher.app')
@section('title_page')
<title>Profile</title>
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
</div>;
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

<div class= "container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i>
                    <b>Thông tin cá nhân</b>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="UpdateAccount">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Username</b></h7>
                            </div>
                            <div class="input-group col-sm-6 {{ $errors->has('username') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="lehainghi" name="username" id="username" value="{{ $data['username'] }}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-3">
                            </div>
                            <div class="input-group col-sm-6">
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>
                        </div>
                        
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Tên đầy đủ</b></h7>
                            </div>
                            <div class="input-group col-sm-6  {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                <input type="text" class="form-control" placeholder="le hai nghi" name="fullname" id="fullname" value = "{{ $data['info']['fullname'] }}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-3">
                            </div>
                            <div class="input-group col-sm-6">
                                <span class="text-danger">{{ $errors->first('fullname') }}</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Ngày sinh</b></h7>
                            </div>
                            <div class="input-group col-sm-6">
                            <?php
                                $date = date_create($data['info']['day_of_birth']);
                                $date = date_format($date,"m/d/Y");
                            ?>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="date" data-format="Y-m-d" name = "birthday" class="form-control" id="birthday"  value = "{{ $data['info']['day_of_birth'] }}" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Giới tính</b></h7>
                            </div>
                            <div class="input-group col-sm-6">
                                <span class="input-group-addon"><i class="fa fa-transgender"></i></span>
                                <select name="gender" id="gender" class="form-control" >
                                    <option value="Nam" <?php echo $data['info']['gender'] == 'Nam'? 'selected="selected"':'';?>>Nam</option>
                                    <option value="Nữ" <?php echo $data['info']['gender'] == 'Nữ'? 'selected="selected"':'';?>>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Địa chỉ</b></h7>
                            </div>
                            <div class="input-group col-sm-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                <input type="text" class="form-control" placeholder="Danang" name="address" id="address" value = "{{ $data['info']['address'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-3">
                            </div>
                            <div class="input-group col-sm-6">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Email</b></h7>
                            </div>
                            <div class="input-group col-sm-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="123@gmail.com" name="email" id="email" value = "{{ $data['email'] }}" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Điện thoại</b></h7>
                            </div>
                            <div class="input-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" maxlength="11" minlength="10"  class="form-control" placeholder="0111111111" name="phone" id="phoneNumber" value = "{{ $data['info']['phone'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-3">
                            </div>
                            <div class="input-group col-sm-6">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        <br>
                        <!-- <button class="btn btn-primary" type="button">Cập nhật</button> -->
                        <center><input type="submit" class="btn btn-primary " style="text-align:center;" value="Cập nhật"></center>
                    </form>
                </div>
                <br>
                <div class="card-footer small text-muted">
                    Thông tin cá nhân
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-key"></i>
                    <b>Mật khẩu</b>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="UpdatePassword">
                    {!! csrf_field() !!}
                    <div class="input-group">
                        <input type = "hidden" class="form-control" value = '{{json_encode($data)}}' id="data" name="data" />
                    </div>
                        <div class="row">
                        <div class="col-sm-4">
                            <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Mật khẩu cũ</b></h7>
                        </div>
                        <div class="input-group col-sm-6 {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="oldPass" name="oldPassword" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="input-group col-sm-6">
                            <span class="text-danger">{{ $errors->first('oldPassword') }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Mật khẩu mới</b></h7>
                        </div>
                        <div class="input-group col-sm-6 {{ $errors->has('newPassword') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="newPass" name="newPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="input-group col-sm-6">
                            <span class="text-danger">{{ $errors->first('newPassword') }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Xác nhận </b></h7>
                        </div>
                        <div class="input-group col-sm-6 {{ $errors->has('confirmPassword') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="confirmPass" name="confirmPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="input-group col-sm-6">
                            <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                        </div>
                    </div>
                    <br>
                        <!-- <button class="btn btn-primary" type="button">Cập nhật</button> -->
                        <center><input type="submit" class="btn btn-primary " style="text-align:center;" value="Lưu mật khẩu"></button></center>
                    </form>
                </div>
                <br>
                <div class="card-footer small text-muted">
                    Mật khẩu
                </div>
            </div>
        </div>
            
    </div>

</div>
            

</section>
@endsection