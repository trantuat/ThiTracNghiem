@extends('layouts.admin.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Quản lý giáo viên</title>
@endsection
@section('content')
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <b>Quản lý thành viên </b>
          </li>
          <li class="breadcrumb-item active">Quản lý giáo viên</li>
        </ol>
        <div class="">
          <div class="card-header">
            <h4><i class="fa fa-user-secret"></i> Danh sách giáo viên</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped table-order-column dataTable" width="100%"  cellspacing="0">
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
                    <td><center>
                    <?php 
                      $detail=$data[$i]['user_id'];
                      $userId=json_encode($detail);
                      echo "<button style='color: red; border: 0; background:none;' id='btnBlock.$i' data-toggle='modal' title='Chặn' data-target='#showProfile' onclick='showProfile($userId)'><i class='fa fa-info-circle'></i></button>";
                      
                      if($data[$i]['is_active']==1){
                        $status=json_encode("1");
                        echo "<button style='color: red; border: 0; background:none;' id='btnBlock.$i' data-toggle='modal' title='Chặn' data-target='#' onclick='blockUser($userId,$status)'><i class='fa fa-lock'></i></button>";
                      }else {
                        $status=json_encode("0");
                        echo "<button style='color: red; border: 0; background:none;' id='btnUnblock.$i' data-toggle='modal' title='Bỏ chặn' data-target='#' onclick='blockUser($userId,$status)'><i class='fa fa-unlock'></i></button>";
                      } 
                      ?><center>
                    </td>
                    </tr>
                    @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

   <!--SHOW PROFILE STUDENT-->
   <div class="modal fade" id="showProfile" role="dialog">
   <div class="modal-dialog modal-lg" style="width:800px;">
      <!-- Modal content-->
       <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-tittle">THÔNG TIN GIÁO VIÊN</h5>
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
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>
                         <input type="text" class="form-control"  id="username" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
             <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-3">
                         <h7 style="font-size:15px; margin-top:5px;"><b>Tên </b></h7>
                     </div>
                     <div class="input-group col-sm-9">
                         <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                         <!-- <label>ABC</label> -->
                         <input type="text" class="form-control"  id="fullname" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
         </div>
         <br>
         <div class="row">
             <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-4">
                         <h7 style="font-size:15px; margin-top:5px;"><b>Ngày sinh</b></h7>
                     </div>
                     <div class="input-group col-sm-8">
                         <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                         <input type="text" class="form-control"  id="dayOfBirth" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
             <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-3">
                         <h7 style="font-size:15px; margin-top:5px;"><b>Địa chỉ</b></h7>
                     </div>
                     <div class="input-group col-sm-9">
                         <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                         <input type="text" class="form-control"  id="address" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
         </div>
         <br>
         <div class="row">
             <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-4">
                         <h7 style="font-size:15px; margin-top:5px;"><b>Giới tính</b></h7>
                     </div>
                     <div class="input-group col-sm-8">
                         <span class="input-group-addon"><i class="fa fa-transgender"></i></span>
                         <input type="text" class="form-control"  id="gender" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
             <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-3">
                         <h7 style="font-size:15px; margin-top:5px;"><b>Email</b></h7>
                     </div>
                     <div class="input-group col-sm-9">
                         <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                         <input type="email" class="form-control" id="email" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
         </div>
         <br>
         <div class="row">
             <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-4">
                         <h7 style="font-size:15px; margin-top:5px;"><b>Điện thoại</b></h7>
                     </div>
                     <div class="input-group col-sm-8">
                         <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                         <input type="text" maxlength="11" minlength="10"  class="form-control" id="phone" readonly style="background-color:white;">
                     </div>
                 </div>
             </div>
         </div>
         </div>
         <div class="container-fluid note" style="height: 250px; overflow-y:auto; overflow-x: hidden;">
             <h6 style="color:red; margin-left:10px;"><b>Lịch sử chặn</b></h6>
             <table id="tableBlock" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                     <tr>
                         <th>STT</th>
                         <th>Ngày chặn</th>
                         <th>Ngày bỏ chặn</th>
                     </tr>
                 </thead>
                 <tbody>
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
