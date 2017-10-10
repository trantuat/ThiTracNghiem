@extends('layouts.student.app')
@section('title_page')
<title>Danh sách đề thi</title>
@endsection
@section('content')

@if (isset($error)) 
<script language='javascript'>
  alert(" {{ $error }}");
</script>
@endif

      <div class="container-fluid">
        <div class="">
          <div class="card-header" style="background-color:white;">
            <i class="fa fa-table"></i>
            <b style="font-size:20px;"> Danh sách đề thi</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" width="100%" cellspacing="0">
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
                    <!-- <td>{{$data[$i]['updated_at']}}</td> -->
                    <td>
                        <!-- <input type="hidden" id="quizzId" name="quizzId" value="{{$data[$i]['quizz_id']}}"> -->
                        <a href="{{ url('/Students/DoTest', $data[$i]['quizz_id']) }}" class="btn btn-success">Làm bài</a>
                        <!-- <a href="/Students/DoTest/{{$data[$i]['quizz_id']}}" class="btn btn-success">Làm bài</a> -->
                    </td>
                  </tr>
                  @endfor
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="./Admin/Login">Logout</a>
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