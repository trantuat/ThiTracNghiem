@extends('layouts.admin.app')
@section('title_page')
<title>Danh sách câu hỏi</title>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="">
          <div class="card-header">
            <i class="fa fa-table"></i>
            <b>Danh sách câu hỏi trong hệ thống</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                  </tr>
                </tfoot>
                <tbody>
                  <td>01</td>
                  <td>10</td>
                  <td>Toán</td>
                  <td>199+299=?</td>
                  <td>29/08/1995</td>
                  
                  <td>
                  <button style="color: red; border: 0; background:none;" data-toggle='modal' title='Update' data-target='#updateQuestion'><b><i class="fa fa-pencil-square-o"></i></b></button>
                      <button style="color: red; border: 0; background:none;" data-toggle='confirmation' title='Delete' ><b><i class="fa fa-trash"></i></b></button>
                  </td>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!--UPDATE QUESTION-->
   <div class="modal fade" id="updateQuestion" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
         <div class="modal-content">
            <form id="formupdateQuestion" method="" class="form-horizontal" >
               <div class="modal-header">
                <h4 class="modal-tittle">CẬP NHẬT CÂU HỎI</h4>
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
                          <select name="updateQuestionClass" id="updateQuestionClass" class="form-control">
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
                            <select name="updateQuestionLevel" id="updateQuestionLevel" class="form-control">
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
                          <select name="updateQuestionSubject" id="updateQuestionSubject" class="form-control">
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
                 <div class="form-group">
                    <label for="updateQuestion"><b>Câu hỏi</b></label>
                    <textarea class="form-control" id="updateQuestion1" cols="40" rows="3"></textarea> 
                 </div>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="updateRadioA" name="question">
                    </span>
                    <input type="text" class="form-control" id="updateAnswerA" >
                 </div>
                 <br>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="updateRadioB" name="question">
                    </span>
                    <input type="text" class="form-control" id="updateAnswerB" >
                 </div>
                 <br>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="updateRadioC" name="question">
                    </span>
                    <input type="text" class="form-control" id="updateAnswerC" >
                 </div>
                 <br>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="updateRadioD" name="question">
                    </span>
                    <input type="text" class="form-control" id="updateAnswerD" >
                 </div>
                 <br>
                 <div class="row" style="margin-left:5px;">
                  <input type="file" name="file" id="updateQuestionFile">
                </div>
             </div>
           
             <div class="modal-footer">
                <input type="submit" id="btnUpdateQuestion" class="btn btn-success btnUpdate" value='Update'>
                <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
             </div>
          </form>
        </div>
      </div>
  </div>


@endsection
@section('script')
    <script>
        $( ".btnUpdate" ).click(function() {
        $.showLoading({name: 'circle-fade',allowHide: false});  
        });
    </script>
@endsection


