@extends('layouts.admin.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Danh sách đề mẫu</title>
@endsection
@section('content')

@if (isset($error)) 
<script language='javascript'>
  alert(" {{ $error }}");
</script>
@endif
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <b>Đề thi mẫu </b>
          </li>
        </ol>
        <div class="">
        <div class="card-header">
            <div class="row">
              <div class="col-sm-11">
                  <h4><i class="fa fa-bank"></i> TỔNG HỢP DANH SÁCH ĐỀ MẪU</h4>
              </div>
              <div class="col-sm-1">
                <button  class="btn btn-danger" title='Add new quizz template' data-toggle="modal" data-target="#formQuizz" onclick="loadDetail('formQuizzTemplate')"><b><i class="fa fa-plus"></i></b></button>
              </div>
            </div>
              
          </div>
         
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped table-order-column dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên bài thi</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Mức độ</th>
                    <th>Số câu</th>
                    <th>Thời gian</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên bài thi</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Mức độ</th>
                    <th>Số câu</th>
                    <th>Thời gian</th>
                    <th>Hành động</th>
                  </tr>
                </tfoot>
                <tbody>
                  

                  @for ($i = 0; $i < count($data); $i++)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$data[$i]['quizz_name']}}</td>
                    <td>{{$data[$i]['class_name']}}</td>
                    <td>{{$data[$i]['topic_name']}}</td>
                    <td>{{$data[$i]['level_name']}}</td>
                    <td>{{$data[$i]['total']}}</td>
                    <td>{{$data[$i]['duration']}}</td>
                    <td style="text-align:center;">
                        <?php
                        $ob=$data[$i];
                        $template=json_encode($ob);
                        $form=json_encode('formUpdateQuizz');
                        echo "<button  style='color: red; border: 0; background:none;' title='update quizz template' data-toggle='modal' data-target='#formUpdateQuizz' onclick='loadDetailQuizzTemplate($template,$form)'><b><i class='fa fa-pencil-square-o'></i></b></button>";
                        
                        $id=$data[$i]['id'];
                        $quizzTemplateId=json_encode($id);
                        echo "<button  style='color: red; border: 0; background:none;' title='Delete quizz template' onclick='deleteQuizzTemplate($quizzTemplateId)'><b><i class='fa fa-trash'></i></b></button>";   
                        ?>
                    </td>
                  </tr>
                  @endfor
                 
                </tbody>
              </table>
              <br>
            </div>
          </div>
        </div>
      </div>

    <!--ADD TEMPLATE -->
    <div class="modal fade" id="formQuizz" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
         <div class="modal-content">
            <form id="formQuizzTemplate" class="form-horizontal" >
            {!! csrf_field() !!}
               <div class="modal-header">
                <h3 class="modal-tittle">TẠO ĐỀ MẪU</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body" style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-4">
                                    <h7 style="font-size:16px; margin-top:5px;"><b>Tên bài quizz</b></h7>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" pattern=".{5,45}" required title="5 đến 25 kí tự" id="quizzName" name="quizzName" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-5">
                                    <h7 style="font-size:16px; margin-top:5px;"><b>Số câu</b></h7>
                                </div>
                                <div class="col-sm-7">
                                        <select name="total" id="total" class="form-control">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                            <option value="60">60</option>
                                            
                                    </select>
                                    <!-- <input type="number" id="doTestTotal" name="doTestTotal" min="1" max="45" class="form-control" required> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-4">
                                <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                            </div>
                            <div class="col-sm-8">
                            <select name="addQuestionClass" id="class" class="form-control">
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
                                <select name="addQuestionLevel" id="level" class="form-control">
                                   
                                </select>
                            </div>
                        </div>
                      </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-5">
                                    <h7 style=" font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                                </div>
                                <div class="col-sm-7">
                                    <select name="addQuestionSubject" id="subject" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>  
                            <br>
                            <div class="row">
                                <div class="control-label col-sm-5">
                                    <h7 style="font-size:16px; margin-top:5px;"><b>Thời gian</b></h7>
                                </div>
                                <div class="col-sm-7">
                                    <select name="duration" id="duration" class="form-control">
                                        <option value="30">30 phút</option>
                                        <option value="45">45 phút</option>
                                        <option value="60">60 phút</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                </form>
                <div class="modal-footer">
                    <button id="btnCreateQuizzTemplate" class="btn btn-success" >Tạo đề mẫu</button>
                    <button class="btn btn-secondary btn-close-popup" data-dismiss="modal">Cancel</button>
                </div>
        </div>
      </div>
  </div>

  <!--UPDATE TEMPLATE -->
  <div class="modal fade" id="formUpdateQuizz" role="dialog">
      <div class="modal-dialog modal-lg" style="width:600px;">
         <!-- Modal content-->
         <div class="modal-content">
            <form id="formUpdateQuizzTemplate" class="form-horizontal" >
            {!! csrf_field() !!}
               <div class="modal-header">
                <h5 class="modal-tittle">CẬP NHẬT ĐỀ MẪU</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body" style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <input type="hidden" id="templateId">
                                <div class="control-label col-sm-4">
                                    <h7 style="font-size:16px; margin-top:5px;"><b>Tên bài quizz</b></h7>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" pattern=".{5,45}" required title="5 đến 25 kí tự" id="updateQuizzName" name="updateQuizzName" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-5">
                                    <h7 style="font-size:16px; margin-top:5px;"><b>Số câu</b></h7>
                                </div>
                                <div class="col-sm-7">
                                        <select name="total" id="updateTotal" class="form-control">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                            <option value="60">60</option>
                                            
                                    </select>
                                    <!-- <input type="number" id="doTestTotal" name="doTestTotal" min="1" max="45" class="form-control" required> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-4">
                                <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                            </div>
                            <div class="col-sm-8">
                            <select name="addQuestionClass" id="updateClass" class="form-control">
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
                                <select name="addQuestionLevel" id="updateLevel" class="form-control">
                                   
                                </select>
                            </div>
                        </div>
                      </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="control-label col-sm-5">
                                    <h7 style=" font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                                </div>
                                <div class="col-sm-7">
                                    <select name="addQuestionSubject" id="updateSubject" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>  
                            <br>
                            <div class="row">
                                <div class="control-label col-sm-5">
                                    <h7 style="font-size:16px; margin-top:5px;"><b>Thời gian</b></h7>
                                </div>
                                <div class="col-sm-7">
                                    <select name="duration" id="updateDuration" class="form-control">
                                        <option value="30">30 phút</option>
                                        <option value="45">45 phút</option>
                                        <option value="60">60 phút</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                </form>
                <div class="modal-footer">
                    <button id="btnUpdateQuizzTemplate" class="btn btn-success" >Cập nhật</button>
                    <button class="btn btn-secondary btn-close-popup" data-dismiss="modal">Cancel</button>
                </div>
        </div>
      </div>
  </div>




@endsection
