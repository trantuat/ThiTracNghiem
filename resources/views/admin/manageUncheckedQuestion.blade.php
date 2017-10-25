@extends('layouts.admin.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Dạnh sách chờ xét duyệt</title>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="">
          <div class="card-header">
            <h5 style="color:red;"><i class="fa fa-pause"></i> Danh sách câu hỏi chờ xét duyệt</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped table-order-column dataTable" width="100%"  cellspacing="0">
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
                    <td>{{$data[$i]['class_name']}}</td>
                    <td>{{$data[$i]['topic_name']}}</td>
                    <td>{{$data[$i]['level_name']}}</td>
                    <td><?php echo $data[$i]['content'];?></td>
                    <td>{{$data[$i]['updated_at']}}</td>
                    <td><center>
                      <a href="/Admins/ShowDetailNonPublicQuestion/{{$data[$i]['question_id']}}"><button style='color: red; border: 0; background:none;' ><b><i class='fa fa-info-circle'></i></b></button></a>
                      <?php 
                      $id=$data[$i]['question_id'];
                      $questionId=json_encode($id);
                      echo "<button style='color: red; border: 0; background:none;' title='check' onclick='checkQuestion($questionId)'><b><i class='fa fa-check-circle'></i></b></button>";
                      
                      echo"<button style='color: red; border: 0; background:none;'  title='uncheck' onclick='deleteQuestion($questionId)' ><b><i class='fa fa-trash'></i></b></button>";
                    ?>
                      </center></td>
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
