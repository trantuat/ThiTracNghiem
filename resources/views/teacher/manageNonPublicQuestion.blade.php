@extends('layouts.teacher.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Danh sách câu hỏi chờ xét duyệt</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-11">
                <h4><i class="fa fa-clock-o"></i> DANH SÁCH CÂU HỎI CHỜ XÉT DUYỆT</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped table-order-column dataTable" width="100%" id="questionList" cellspacing="0">
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
                 <a href="ShowDetailQuestionNonPublic/{{$data[$i]['question_id']}}"> <button style='color: red; border: 0; background:none;' title='update' ><b><i class='fa fa-pencil-square-o'></i></b></button> </a>                    
                 <?php 
                  $id=$data[$i]['question_id'];
                  $questionId=json_encode($id);
                 echo "<button style='color: red; border: 0; background:none;' data-toggle='confirmation' title='Delete' onclick='deleteQuestion($questionId)'><b><i class='fa fa-trash'></i></b></button>";
                ?>
                 </center>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br>
</div>
@endsection