@extends('layouts.admin.app')
@section('title_page')
<title>Dạnh sách chờ xét duyệt</title>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="">
          <div class="card-header">
            <i class="fa fa-table"></i>
            <b>Danh sách câu hỏi chờ xét duyệt</b>
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
                    <button style="color: red; border: 0; background:none;" data-toggle='modal' title='Check question' data-target='#checkQuestion'><b><i class="fa fa-info-circle"></i></b></button>
                    <button style="color: red; border: 0; background:none;" data-toggle='confirmation' title='Delete' ><b><i class="fa fa-trash"></i></b></button>
                  </td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!--CHECK QUESTION-->
   <div class="modal fade" id="checkQuestion" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
         <div class="modal-content">
            <form id="formCheckQuestion" method="" class="form-horizontal" >
               <div class="modal-header">
                <h4 class="modal-tittle">XÉT DUYỆT CÂU HỎI</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body" style="margin: 10px;">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                        </div>
                        <div class="input-group col-sm-8">
                          <input type="text" name="checkClass" id="checkClass" class="form-control" readonly>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                        </div>
                        <div class="input-group col-sm-8">
                          <input type="text" name="checkLevel" id="checkLevel" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="control-label col-sm-5">
                          <h7 style="margin-left:20px; font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="input-group col-sm-7">
                          <input type="text" name="checkSubject" id="checkSubject" class="form-control" readonly>
                        </div> 
                      </div>
                    </div>
                  </div>
                <br>
                 <div class="form-group">
                    <label for="updateQuestion"><b>Câu hỏi</b></label>
                    <Textarea class="form-control" id="checkQuestion" cols="40" rows="3" readonly></Textarea> 
                 </div>
                 <div class="input-group" readonly>
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="checkRadioA" name="question" disabled>
                    </span>
                    <input type="text" class="form-control" id="checkAnswerA" readonly >
                 </div>
                 <br>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="checkRadioB" name="question" disabled>
                    </span>
                    <input type="text" class="form-control" id="checkAnswerB" readonly>
                 </div>
                 <br>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="checkRadioC" name="question" disabled>
                    </span>
                    <input type="text" class="form-control" id="checkAnswerC" readonly>
                 </div>
                 <br>
                 <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" aria-label="The right answer" id="checkRadioD" name="question" disabled>
                    </span>
                    <input type="text" class="form-control" id="checkAnswerD" readonly>
                 </div>
                 <br>
             </div>
           
             <div class="modal-footer">
                <input type="submit" id="btnCheckQuestion" class="btn btn-success btnCheck" value='Check'>
                <input type="submit" id="btnUncheckedQuestion" class="btn btn-success btnUncheked" value='Uncheck'>
                <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
             </div>
          </form>
        </div>
      </div>
  </div>
@endsection
