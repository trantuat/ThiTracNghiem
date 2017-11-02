@extends('layouts.admin.app')
@section('title_page')
<title>Danh sách câu hỏi</title>
@endsection
@section('content')
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <b>Quản lý câu hỏi </b>
          </li>
          <li class="breadcrumb-item active">Danh sách câu hỏi</li>
        </ol>
        <div class="">
          <div class="card-header">
          <h4><i class="fa fa-question-circle"></i> TỔNG HỢP DANH SÁCH CÂU HỎI</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped table-order-column dataTable" width="100%"  cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Nội dung</th>
                    <th>Mức độ</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Mức độ</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                  @for($i=0;$i<count($data);$i++)
                  <tr>
                    <td>{{$i+1}}</td>
                   
                    <td>{{$data[$i]['class_id']}}</td>
                    <td>{{$data[$i]['topic_name']}}</td>
                    <td>{{$data[$i]['level_name']}}</td>
                    <td><?php echo $data[$i]['content'];?></td>
                    <td>{{$data[$i]['updated_at']}}</td>
                    <td><center>
                      
                      <a href="/Admins/ShowDetailQuestion/{{$data[$i]['question_id']}}"><button style='color: red; border: 0; background:none;' ><b><i class='fa fa-info-circle'></i></b></button></a>
                      <!-- <button style='color: red; border: 0; background:none;' data-toggle="modal" data-target="#detailQuestion" onclick="showDetailQuestion()"><b><i class='fa fa-info-circle'></i></b></button> -->
                    
                    </center</td>
                  </tr>
                  @endfor

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>
      </div>

    <!--DETAIL QUESTION-->
   <div class="modal fade" id="detailQuestion" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
         <div class="modal-content">
            <!-- <form id="formupdateQuestion" method="" class="form-horizontal" > -->
               <div class="modal-header">
                <h5 class="modal-tittle">NỘI DUNG CÂU HỎI</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body" style="margin: 10px;">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                        </div>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" id="detailClass" name="detailClass">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                          </div>
                          <div class="col-sm-8 form-group">
                            <input type="text" class="form-control" id="detailLevel" name="detailLevel">
                          </div>
                        </div>
                      </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="control-label col-sm-5">
                        <h7 style="font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="col-sm-7 form-group">
                          <input type="text" class="form-control" id="detailSubject" name="detailSubject">
                        </div>
                      </div>  
                    </div>
                </div>
                <br>
                 <div class="form-group">
                    <label for="updateQuestion"><b>Câu hỏi</b></label>
                    <textarea class="form-control" id="updateQuestion1" cols="40" rows="3"></textarea> 
                 </div>
                 <div class="form-group">
                 <table>
                    <td style= "width: 20px; vertical-align:top;"><input style= "margin-top:5px;" type="radio" aria-label="The right answer" value="" name=""></td>
                    <td style= "vertical-align:top">ABC</td>
             </table>
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


