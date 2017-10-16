@extends('layouts.admin.app')
@section('title_page')
<title>Quản lý thành viên</title>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="">
          <div class="card-header">
            <i class="fa fa-table"></i>
            <b>Danh sách thí sinh</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
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
                      <center><button class="btn btn-danger " data-toggle='modal' title='see result' data-target='#'>Chặn</button></center>
                  </td>
                  </tr>
                  @endfor
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!--UPDATE STUDENT-->
   <div class="modal fade" id="updateStudent" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
          <div class="modal-content">
            <form id="formUpdateStudent" method="" class="form-horizontal" >
              <div class="modal-header">
                <h4 class="modal-tittle">CẬP NHẬT THÔNG TIN THÍ SINH</h4>
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


  <!--SEE RESULT-->
  <div class="modal fade" id="seeResultOfStudent" role="dialog">
      <div class="modal-dialog modal-lg" style="width:800px;">
         <!-- Modal content-->
          <div class="modal-content">
            <form id="formUpdateStudent" method="" class="form-horizontal" >
              <div class="modal-header">
                <h4 class="modal-tittle">XEM KẾT QUẢ LUYỆN THI</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="margin: 10px;">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-4">
                            <h7 style="font-size:15px; margin-top:5px;"><b>Username</b></h7>
                        </div>
                        <div class="input-group col-sm-8">
                            <input type="text" class="form-control" placeholder="lehainghi" id="seeUsername" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-4">
                            <h7 style="font-size:15px; margin-top:5px;"><b>Điểm cao nhất</b></h7>
                        </div>
                        <div class="input-group col-sm-8">
                            <input type="text" class="form-control" placeholder="3" id="seeHighestScore" readonly>
                        </div>
                      </div>
                    </div>
                  <div>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" id="dataTable1" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ngày làm bài</th>
                      <th>Môn</th>
                      <th>Số câu đúng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Ngày làm bài</th>
                      <th>Môn</th>
                      <th>Số câu đúng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <td>29/08/1995</td>
                    <td>Toán</td>
                    <td>20</td>
                  </tbody>
                </table>
              </div>
              <br>
              <div class="modal-footer">
                  <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection
