


@extends('layouts.teacher.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Danh sách câu hỏi</title>
@endsection

@section('head')
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckeditor\ckeditor.js") }}"></script>
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckfinder\ckfinder.js") }}"></script>
@endsection
@section('content')

@if (isset($error)) 
    <script language='javascript'>
      alert(" {{ $error }}");
    </script>
@endif


      <div class="container-fluid">
        <div class="">
          <div class="card-header">
          <div class="row">
             <div class="col-sm-11">
                <h5><i class="fa fa-table"></i> Danh sách câu hỏi</h5>
              </div>
              <div class="col-sm-1">
               <a href="AddNewQuestion"> <button  class="btn btn-danger" title='Add new question' ><b><i class="fa fa-plus"></i></b></button></a>
              </div>
            </div>
            
          </div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" width="100%" id="questionList" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Môn</th>
                    <th>Lớp</th>
                    <th>Mức độ</th>
                    <th>Câu hỏi</th>
                    <th>Ngày Đăng</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Môn</th>
                    <th>Lớp</th>
                    <th>Mức độ</th>
                    <th>Câu hỏi</th>
                    <th>Ngày Đăng</th>
                    <th>Hành động</th>
                  </tr>
                </tfoot>
                <tbody>
                  @for ($i = 0; $i < count($data); $i++)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$data[$i]['class_name']}}</td>
                    <td>{{$data[$i]['topic_name']}}</td>
                    <td>{{$data[$i]['level_name']}}</td>
                    <td> <?php echo $data[$i]['content'];?></td>
                    <td>{{$data[$i]['updated_at']}}</td>
                    <td> <center>
                    <input type="hidden" id="question_id" name="question_id" value="{{$data[$i]['question_id']}}">
                   <!--  <?php 
                      $detail=json_encode($data[$i]);
                      echo "<button style='color: red; border: 0; background:none;' data-toggle='modal' title='update' data-target='#updateQuestion' onclick='showUpdateForm($detail)'><b><i class='fa fa-pencil-square-o'></i></b></button>";?></td>
 -->
                     <a href="UpdateQuestion/{{$data[$i]['question_id']}}"> <button style='color: red; border: 0; background:none;' title='update' ><b><i class='fa fa-pencil-square-o'></i></b></button> </a>                    
                    </center>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>

        
      </div>

  <!--UPDATE QUESTION-->
   <div class="modal fade" id="updateQuestion" role="dialog">
      <div class="modal-dialog modal-lg" style="width:1000px;">
         <!-- Modal content-->
         <div class="modal-content">
            <form id="formUpdateQuestion" method="" class="form-horizontal" >
            {{ csrf_field() }}
                <div class="modal-header">
                  <h4 class="modal-tittle">CẬP NHẬT CÂU HỎI</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <div class="modal-body" >
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="row col-sm-4">
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
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                        </div>
                        <div class="col-sm-8">
                          <select name="updateQuestionLevel" id="updateQuestionLevel" class="form-control">
                            <option value="1" id="1">Dễ</option>
                            <option value="2" id="2">Trung bình</option>
                            <option value="3" id="3">Khó</option>
                          </select>
                        </div>
                      </div>
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-5">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="col-sm-7">
                          <select name="updateQuestionSubject" id="updateQuestionSubject" class="form-control">
                            <!-- <option value="1">Toán</option>
                            <option value="2">Vật lý</option>
                            <option value="3">Hoá học</option>
                            <option value="4">Sinh học</option>
                            <option value="5">Ngũ văn</option>
                            <option value="6">Lịch sử</option>
                            <option value="7">Tiếng anh</option> -->
                          </select>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <br>
                  <div class="modal-body-answer">
                    <div class="addMoreAnswer" id="addMoreAnswer"> 
                      <!-- <div class="form-group">
                          <label for="addQuestion"><b>Câu hỏi</b></label>
                          <Textarea class="form-control" id="addQuestion" cols="40" rows="3"></Textarea> 
                      </div>

                      <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="The right answer" id="radio1" >
                          </span>
                          <input type="text" class="form-control" id="answer1" >
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="The right answer" id="radio2" >
                          </span>
                          <input type="text" class="form-control" id="answer2" >
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="The right answer" id="radio3" >
                          </span>
                          <input type="text" class="form-control" id="answer3" >
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="The right answer" id="radio4" >
                          </span>
                          <input type="text" class="form-control" id="answer4" >
                      </div> -->
                    </div>
                    <br>
                    <div class="input-group" style="margin-bottom:30px;">
                        <button  name="addAnswerForUpdate" id="addAnswerForUpdate" class="btn btn-primary" style="position: absolute; right: 0;">More answers</button> 
                    </div>
                    <input type="hidden" id="numberOfAnswer" name="numberOfAnswer" value="4">
                  </div>
              </div>
             <div class="modal-footer">
                <input type="submit" id="btnUpdateQuestion" class="btn btn-success btnUpdate" value='Add'>
                <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
             </div>
          </form>
        </div>
      </div>
  </div>
@endsection
