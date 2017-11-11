@extends('layouts.student.app')
@section('title_page')
<title>Danh sách đề mẫu</title>
@endsection
@section('content')

@if (isset($error)) 
<script language='javascript'>
  alert(" {{ $error }}");
</script>
@endif
    <div class="content-wrapper animated fadeIn">
      <div class="container-fluid">
        <div class="">
          <div class="card-header" style="background-color:white;">
            <h4> <i class="fa fa-table"></i> TỔNG HỢP DANH SÁCH ĐỀ MẪU </h4>
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
                    <th>Tổng số câu</th>
                    <th>Thời gian làm</th>
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
                    <th>Tổng số câu</th>
                    <th>Thời gian làm</th>
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
                        $quizz=$data[$i];
                        $quizzOb=json_encode($quizz);
                        echo "<button class='btn btn-success' onclick='createQuizz($quizzOb)'>Làm bài</button>";
                        ?>
                    </td>
                  </tr>
                  @endfor
                 
                </tbody>
              </table>
            </div>
          </div>
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