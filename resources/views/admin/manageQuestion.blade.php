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
              <table class="table table-hover table-bordered table-striped table-order-column dataTable" cellspacing="0" width="100%"  cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Mức độ</th>
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
                      
                      <a href="/Admins/ShowDetailQuestion/{{$data[$i]['question_id']}}"><button style='color: red; border: 0; background:none;' ><b><i class='fa fa-pencil-square-o'></i></b></button></a>
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


@endsection
@section('script')
    <script>
        $( ".btnUpdate" ).click(function() {
        $.showLoading({name: 'circle-fade',allowHide: false});  
        });
    </script>
@endsection


