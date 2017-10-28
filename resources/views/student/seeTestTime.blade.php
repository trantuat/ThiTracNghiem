@extends('layouts.student.app')
@section('title_page')
<title>Lịch sử bài thi</title>
@endsection
@section('content')

@if (isset($error)) 
<script language='javascript'>
  alert(" {{ $error }}");
</script>
@endif
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="">
          <div class="card-header" style="background-color:white;">
          <div class="row">
          <div class="col-sm-10">
              <h5><i class="fa fa-table"></i> Chi tiết lịch sử bài thi</h5>
            </div>
            <div class="col-sm-1" style="margin-left:30px;">
            <a href="/Students/DoTest/{{$quizzId}}/{{$duration}}" class='btn btn-success' >Làm lại bài</a>
            </div>
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
                    <th>Tổng số câu</th>
                    <th>Thời gian làm</th>
                    <th>Ngày làm</th>
                    <th>Lần thi</th>
                    <th>Điểm số</th>
                    <th>Chi tiết</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên bài thi</th>
                    <th>Tổng số câu</th>
                    <th>Thời gian làm</th>
                    <th>Ngày làm</th>
                    <th>Lần thi</th>
                    <th>Điểm số</th>
                    <th>Chi tiết</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                 

                  @for ($i = 0; $i < count($data); $i++)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$data[$i]['quizz_name']}}</td>
                    <td>{{$data[$i]['total']}}</td>
                    <td>{{$data[$i]['duration']}}</td>
                    <td>{{$data[$i]['created_at']}}</td>
                    <td>{{$data[$i]['quizz_times']}}</td>
                    <td>{{$data[$i]['score']}}</td>
                    <td>
                      <input type="hidden" id="historiesId" value="{{$data[$i]['histories_id']}}">
                      <!-- <button style="color: red; border: 0; background:none;" data-toggle='modal' title='see result' data-target='#seeResultOfStudent'><b><i class="fa fa-list"></i></b></button> -->
                      
                      <a href="{{ url('/Students/Result',$data[$i]['histories_id'])}}" ><center><button style="color: red; border: 0; background:none; " ><b><i class="fa fa-info-circle"></i></b></button></center></a>
                      <!-- <button style="color: red; border: 0; background:none;" data-toggle='modal' title='Update info' data-target='#updateStudent'><b><i class="fa fa-pencil-square-o"></i></b></button> -->
                      <!-- <button style="color: red; border: 0; background:none;" data-toggle='confirmation' title='Delete student' ><b><i class="fa fa-trash"></i></b></button> -->
                    </td>
                  </tr>
                  @endfor
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <div>




@endsection
@section('script')
    <script>
        $( ".btnUpdate" ).click(function() {
        $.showLoading({name: 'circle-fade',allowHide: false});  
        });
    </script>
@endsection