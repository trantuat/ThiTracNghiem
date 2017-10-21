@extends('layouts.admin.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Quản lý giáo viên</title>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="">
          <div class="card-header">
            <h5 style="color:red;"><i class="fa fa-user-secret"></i> Danh sách giáo viên</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped table-order-column dataTable" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Hành động</th>
                  </tr>
                </tfoot>
                <tbody>
                    @for($i=0;$i<count($data);$i++)
                    <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$data[$i]['username']}}</td>
                    <td>{{$data[$i]['fullname']}}</td>
                    <td>{{$data[$i]['email']}}</td>
                    <td>
                    <?php 
                    $detail=$data[$i]['user_id'];
                    $userId=json_encode($detail);
                    if($data[$i]['is_active']==1){
                        $status=json_encode("1");
                        echo "<center><button class='btn btn-danger ' id='btnBlock.$i' data-toggle='modal' title='Chặn' data-target='#' onclick='blockUser($userId,$status)'>Chặn</button></center>";
                    }else {
                        $status=json_encode("0");
                        echo "<center><button class='btn btn-danger ' id='btnUnblock.$i' data-toggle='modal' title='Bỏ chặn' data-target='#' onclick='blockUser($userId,$status)'>Bỏ chặn</button></center>";
                    } 
                    ?>
                    </td>
                    </tr>
                    @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!--UPDATE TEACHER-->
   <div class="modal fade" id="updateTeacher" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
          <div class="modal-content">
            <form id="formUpdateStudent" method="" class="form-horizontal" >
              <div class="modal-header">
                <h4 class="modal-tittle">CẬP NHẬT THÔNG TIN GIÁO VIÊN</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="margin: 10px;">
                  <div class="row">
                    <div class="col-sm-offset-2 col-sm-3">
                        <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Username</b></h7>
                    </div>
                    <div class="input-group col-sm-6">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="lehainghi" id="username" readonly>
                        
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Tên đầy đủ</b></h7>
                    </div>
                    <div class="input-group col-sm-6">
                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                        <input type="text" class="form-control" placeholder="le hai nghi" id="fullname" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Ngày sinh</b></h7>
                    </div>
                    <div class="input-group col-sm-6">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" placeholder="29/08/1995" id="dayOfBirth" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Địa chỉ</b></h7>
                    </div>
                    <div class="input-group col-sm-6">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <input type="text" class="form-control" placeholder="Danang" id="address" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Email</b></h7>
                    </div>
                    <div class="input-group col-sm-6">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="123@gmail.com" id="email" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <h7 style="margin-left:20px; font-size:15px; margin-top:5px;"><b>Điện thoại</b></h7>
                    </div>
                    <div class="input-group col-sm-6">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" maxlength="11" minlength="10"  class="form-control" placeholder="0111111111" id="phoneNumber">
                    </div>
                </div>
                <br>
              <div class="modal-footer">
                  <input type="submit" id="btnUpdateStudent" class="btn btn-success btnUpdate" value='Update'>
                  <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection
