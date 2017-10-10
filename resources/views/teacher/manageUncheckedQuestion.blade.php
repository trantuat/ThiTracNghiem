@extends('layouts.teacher.app')
@section('title_page')
<title>Danh sách câu hỏi chờ xét duyệt</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-11">
                <h5><i class="fa fa-table"></i> Danh sách câu hỏi đang chờ xét duyệt</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" id="uncheckedQuestionList" cellspacing="0">
                <thead>
                    <tr>
                    <th>Môn</th>
                    <th>Lớp</th>
                    <th>Mức độ </th>
                    <th>Câu hỏi</th>
                    <th>Ngày Đăng</th>
                    <th>Xoá</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Môn</th>
                    <th>Lớp</th>
                    <th>Mức độ </th>
                    <th>Câu hỏi</th>
                    <th>Ngày Đăng</th>
                    <th>Xoá</th>
                    </tr>
                </tfoot>
                <tbody>
                    <td>Toán</td>
                    <td>8</td>
                    <td>Dễ</td>
                    <td>1+1=?</td>
                    <td>29/08/2017</td>
                    <td >
                        <button style="color: red; border: 0; background:none;" data-toggle='confirmation' title='Delete' ><b><i class="fa fa-trash"></i></b></button>
                    </td>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection