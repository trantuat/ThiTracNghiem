


@extends('layouts.teacher.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Danh sách câu hỏi</title>
@endsection

@section('head')
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckeditor\ckeditor.js") }}"></script>
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckfinder\ckfinder.js") }}"></script>
  <!-- <script language='javascript'>
       window.addEventListener('load',function(){
            history.pushState(null,null,window.location.pathname);
        });
        window.addEventListener('popstate',function(){
            window.location.href = "/Teachers";
        });
        </script> -->
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
               <a href="AddNewQuestion"> <button  class="btn btn-danger" title='Add new question' onclick="loadSubject()"><b><i class="fa fa-plus"></i></b></button></a>
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
                     <a href="ShowDetailQuestion/{{$data[$i]['question_id']}}"> <button style='color: red; border: 0; background:none;' title='update' ><b><i class='fa fa-info-circle'></i></b></button> </a>                    
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

@endsection
