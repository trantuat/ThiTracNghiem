@extends('layouts.teacher.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Profile</title>
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
    <strong>Lỗi: </strong> {{$error}}
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
        <strong>Thành công: </strong> Cập nhật thành công
    </div>
@endif
@endif

<div id="result">
</div>

<div class= "container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i>
                    <b>Thông tin cá nhân</b>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" class="cmxform" method="POST" action="UpdateAccount" name="formUpdateProfile" id="formUpdateProfile">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Username <span class="text-danger">*</span></b></h7>
                            </div>
                            <div class="form-group input-group col-sm-9 " style="position:relative">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="lehainghi" name="username" id="username" value="{{ $data['username'] }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Tên đầy đủ <span class="text-danger">*</span></b></h7>
                            </div>
                            <div class=" form-group input-group col-sm-9 ">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input type="text" class="form-control" placeholder="le hai nghi" name="fullname" id="fullname" value = "{{ $data['info']['fullname'] }}" >
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Ngày sinh <span class="text-danger">*</span></b></h7>
                            </div>
                            <div class="form-group input-group col-sm-9">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="date"  class="form-control" data-format="Y-m-d" name = "birthday" class="form-control" id="birthday"  value = "{{ $data['info']['day_of_birth'] }}" >
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Giới tính</b></h7>
                            </div>
                            <div class="form-group input-group col-sm-9">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-transgender"></i></span>
                                    <select name="gender" id="gender" class="form-control" value="{{$data['info']['gender']}}">
                                        <option value="Nam" <?php echo $data['info']['gender'] == 'Nam'? 'selected="selected"':'';?>>Nam</option>
                                        <option value="Nữ" <?php echo $data['info']['gender'] == 'Nữ'? 'selected="selected"':'';?>>Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Địa chỉ</b></h7>
                            </div>
                            <div class="form-group input-group col-sm-9 ">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                    <input type="text" class="form-control" placeholder="Danang" name="address" id="address" value = "{{ $data['info']['address'] }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Email</b></h7>
                            </div>
                            <div class="form-group input-group col-sm-9">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="123@gmail.com" name="email" id="email" value = "{{ $data['email'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Điện thoại</b></h7>
                            </div>
                            <div class="form-group input-group col-sm-9 ">
                                <div class="row col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" maxlength="11" minlength="10"  class="form-control" placeholder="0111111111" name="phone" id="phoneNumber" value = "{{ $data['info']['phone'] }}">
                                </div>
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
                    <form class="form-horizontal" class="cmxform" method="POST" id="formUpdatePasswordForTeacher">
                    {!! csrf_field() !!}
                    <!-- <div class="input-group">
                        <input type = "hidden" class="form-control" value = '{{json_encode($data)}}' id="data" name="data" />
                    </div> -->
                        <div class="row">
                            <div class="col-sm-4">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Mật khẩu cũ <span class="text-danger">*</span></b></h7>
                            </div>
                            <div class="input-group col-sm-8 ">
                                <div class="row col-sm-8">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" >
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Mật khẩu mới <span class="text-danger">*</span></b></h7>
                            </div>
                            <div class="input-group col-sm-8">
                                <div class="row col-sm-8">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Xác nhận <span class="text-danger">*</span></b></h7>
                            </div>
                            <div class="input-group col-sm-8 ">
                                <div class="row col-sm-8">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                </div>
                            </div>
                        </div>
                        <br>
                        
                            <!-- <button class="btn btn-primary" type="button">Cập nhật</button> -->
                            <center><input type="submit" class="btn btn-primary " style="text-align:center;" value="Lưu mật khẩu"></center>
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