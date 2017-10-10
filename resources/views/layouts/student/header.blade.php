
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/Students" style="margin-right:50px;"><i class='fa fa-home'><b> Trang chủ </b></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Students/Profile" style="margin-right:50px;"><i class='fa fa-user'><b> Thông tin cá nhân </b></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Students/History" style="margin-right:50px;"><i class='fa fa-history'><b> Lịch sử thi </b></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-toggle='modal' title='test' data-target='#formTest' style="margin-right:50px;"><i class='fa fa-diamond'><b> Làm bài thi </b></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="/Students/Quizz"  style="margin-right:50px;"><i class='fa fa-list'><b> Danh sách đề thi </b></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="dropdown order-1">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <strong><span class="fa fa-user-circle icon-size" >
                            <label><b><?php echo session('username', ''); ?></b></label>
                        </span></strong>
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" > 
                        <li class="p-3" style="width:300px;">
                            <div class="navbar-login" >
                                <div class="">
                                    <i class="fa fa-user">
                                        <label class="text-left" style="margin-left:10px;"><strong><?php echo session('username', ''); ?></strong></label>
                                    </i>
                                    <i class="fa fa-envelope">
                                        <label class="text-left" style="margin-left:10px;"><strong><?php echo session('email', ''); ?></strong></label>
                                    </i>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                            <a href="/Students/Profile" class="btn btn-primary btn-block"><i class="fa fa-user-md"></i><b> Profile</b></a>
                                    </div>
                                    <div class="col-lg-6">
                                            <a href="/Logout" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i><b>Đăng xuất </b></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="formTest" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
         <div class="modal-content">
            <form id="formDoTest" class="form-horizontal" action="DoTest" >
               <div class="modal-header">
                <h4 class="modal-tittle">CHỌN LỰA BÀI THI</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body" style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="control-label col-sm-4">
                        <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                        </div>
                        <div class="col-sm-8">
                          <select name="doTestClass" id="doTestClass" class="form-control">
                            <option value="1">Lớp 1</option>
                            <option value="2">Lớp 2</option>
                            <option value="3">Lớp 3</option>
                            <option value="4">Lớp 4</option>
                            <option value="5">Lớp 5</option>
                            <option value="6">Lớp 6</option>
                            <option value="7">Lớp 7</option>
                            <option value="8">Lớp 8</option>
                            <option value="9">Lớp 9</option>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                          </div>
                          <div class="col-sm-8">
                            <select name="doTestLevel" id="doTestLevel" class="form-control">
                              <option value="de">Dễ</option>
                              <option value="trungbinh">Trung bình</option>
                              <option value="kho">Khó</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="control-label col-sm-5">
                        <h7 style="margin-left:20px; font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="col-sm-7">
                          <select name="doTestSubject" id="doTestSubject" class="form-control">
                            <option value="toan">Toán</option>
                            <option value="van">Văn</option>
                            <option value="anhvan">Anh Văn</option>
                            <option value="dia">Đia lý</option>
                            <option value="su">Lịch sử</option>
                          </select>
                        </div>
                      </div>  
                    </div>
                </div>
                <br>
             </div>
             <div class="modal-footer">
                <input type="submit" id="btnDoTest" class="btn btn-success btnDo" value='Bắt đầu làm bài'>
                <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
             </div>
          </form>
        </div>
      </div>
  </div>






    