@extends('layouts.student.app')
@section('title_page')
<title>Chọn lựa bài thi</title>
@endsection
@section('content')
<div class= "container-fluid">
<div class="card mb-3">
    <div class="card-header" style="font-size:17px;">
        <h5><i class="fa fa-area-chart">Chọn lựa bài thi</i></h5>
    </div>
    <br>
    <div class="card-body">
        <form class="form-horizontal" action="">
            <div class="row">
                <div class="col-lg-6 row">
                    <div class="control-label col-sm-4">
                        <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                    </div>
                    <div class="col-sm-5">
                        <select name="updateQuestionSubject" id="updateQuestionSubject" class="form-control">
                            <option value="toan">Toán</option>
                            <option value="van">Văn</option>
                            <option value="anhvan">Anh Văn</option>
                            <option value="dia">Đia lý</option>
                            <option value="su">Lịch sử</option>
                        </select>
                    </div>
                </div>  
                <div class="col-lg-6 row">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 row">
                    <div class="control-label col-sm-4">
                        <h7 style=" font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                    </div>
                    <div class="col-sm-5">
                    <select name="updateQuestionSubject" id="updateQuestionSubject" class="form-control">
                        <option value="toan">Toán</option>
                        <option value="van">Văn</option>
                        <option value="anhvan">Anh Văn</option>
                        <option value="dia">Đia lý</option>
                        <option value="su">Lịch sử</option>
                    </select>
                    </div>
                </div>  
                <div class="col-lg-6 row">
                    <div class="control-label col-sm-3">
                    <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                    </div>
                    <div class="col-sm-5">
                        <select name="updateQuestionLevel" id="updateQuestionLevel" class="form-control">
                        <option value="de">Dễ</option>
                        <option value="trungbinh">Trung bình</option>
                        <option value="kho">Khó</option>
                        </select>
                    </div>
                </div>
            </div>
        <br><br>
        <center><input type="submit" class="btn btn-primary " style="text-align:center;" id="startTest" value="Làm bài"></center>
        </form>
    </div>
    </div>
</div>



@endsection