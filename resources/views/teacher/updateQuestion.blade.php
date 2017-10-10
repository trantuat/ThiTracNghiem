


@extends('layouts.teacher.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('head')
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckeditor\ckeditor.js") }}"></script>
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckfinder\ckfinder.js") }}"></script>
@endsection

@section('title_page')
<title>Cập nhật câu hỏi</title>
@endsection
@section('content')

@if (isset($error)) 
    <script language='javascript'>
      alert(" {{ $error }}");
    </script>
@endif

      <div class="container-fluid">
            <div id="formAddQuestion" method="" class="form-horizontal" >
            {{ csrf_field() }}
                <div class="modal-header">
                  <h4 class="modal-tittle">CẬP NHẬT CÂU HỎI</h4>
                   
                </div>
               <div class="card-body"  style="margin-bottom: 40px; padding-bottom: 80px;" >
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                        </div>
                        <div class="col-sm-8">
                          <select name="addQuestionClass" id="addQuestionClass" class="form-control">
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
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                        </div>
                        <div class="col-sm-8">
                          <select name="addQuestionLevel" id="addQuestionLevel" class="form-control">
                            <option value="1" id="1">Dễ</option>
                            <option value="2" id="2">Trung bình</option>
                            <option value="3" id="3">Khó</option>
                          </select>
                        </div>
                      </div>
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-5">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="col-sm-7">
                          <select name="addQuestionSubject" id="addQuestionSubject" class="form-control">
                            <option value="1">Toán</option>
                            <option value="2">Vật lý</option>
                            <option value="3">Hoá học</option>
                            <option value="4">Sinh học</option>
                            <option value="5">Ngũ văn</option>
                            <option value="6">Lịch sử</option>
                            <option value="7">Tiếng anh</option>
                          </select>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <br>
                  <div class="modal-body-answer">
                      <div class="form-group" >
                          <label for="addQuestion"><b>Câu hỏi</b></label>
                              <Textarea class="form-control" id="questionContent"  name="questionContent" cols="40" rows="3"></Textarea>
                           <script>
                          CKEDITOR.replace( 'questionContent',
                   {
                      filebrowserBrowseUrl : '/editor/ckfinder/ckfinder.html',
                      // Image dialog, "Browse Server" button
                      filebrowserImageBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Images',
                      // Flash dialog, "Browse Server" button
                      filebrowserFlashBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Flash',
                      // Upload tab in the Link dialog
                      filebrowserUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                      // Upload tab in the Image dialog
                      filebrowserImageUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                      // Upload tab in the Flash dialog
                      filebrowserFlashUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                   }  );
                        </script>
                      </div>
                   <div class="addMoreAnswer" id="addMoreAnswer"> 
                     <div class="editor1" >
                         <div class="input-group" >
                            <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                              <input type="checkbox" aria-label="The right answer" id="checkbox_answer1">
                            </span>
                             <input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                           <span class="input-group-btn">
                               <button class="btn btn-secondary" type="button" id ="editor1" onclick="deleteAnswer(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button>
                           </span>
                           <span class="input-group-btn">
                               <button class="btn btn-secondary" name="addAnswer" id="addAnswer" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button>
                           </span>
                        </div>
                       <!-- //  <input type="text" class="form-control" id="answer1" > -->
                       <Textarea class="form-control" id="answer1"  name="answer1" ></Textarea>
                         <script>
                          CKEDITOR.replace( 'answer1',
                              {
                                filebrowserBrowseUrl : '/editor/ckfinder/ckfinder.html',
                                // Image dialog, "Browse Server" button
                                filebrowserImageBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Images',
                                // Flash dialog, "Browse Server" button
                                filebrowserFlashBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Flash',
                                // Upload tab in the Link dialog
                                filebrowserUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                // Upload tab in the Image dialog
                                filebrowserImageUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                // Upload tab in the Flash dialog
                                filebrowserFlashUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }  );
                        </script>
                        <br>
                      </div>
                      <div class="editor2" >
                          <div class="input-group">
                              <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                                <input type="checkbox" aria-label="The right answer"  id="checkbox_answer2" >

                              </span>

                               <input type="text" class="form-control" id="answer" value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                           <span class="input-group-btn">
                               <button class="btn btn-secondary" type="button" id ="editor2" onclick="deleteAnswer(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button>
                           </span>
                           <span class="input-group-btn">
                               <button class="btn btn-secondary" name="addAnswer" id="addAnswer" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button>
                           </span>
                           </div>
                         <!-- //  <input type="text" class="form-control" id="answer1" > -->
                         <Textarea class="form-control" id="answer2"  name="answer2"></Textarea>
                           <script>
                            CKEDITOR.replace( 'answer2',
                                {
                                  filebrowserBrowseUrl : '/editor/ckfinder/ckfinder.html',
                                  // Image dialog, "Browse Server" button
                                  filebrowserImageBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Images',
                                  // Flash dialog, "Browse Server" button
                                  filebrowserFlashBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Flash',
                                  // Upload tab in the Link dialog
                                  filebrowserUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                  // Upload tab in the Image dialog
                                  filebrowserImageUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                  // Upload tab in the Flash dialog
                                  filebrowserFlashUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                               }  );
                          </script>
                          <br>
                        </div>
                      </div>
                    
                      <input type="hidden" id="numberOfAnswer" name="numberOfAnswer" value="4">
                    </div>
                     <input type="submit" id="btnAddQuestion" class="btn btn-success btnAdd" value='CẬP NHẬT CÂU HỎI' style="float: right;margin-top: 20px;">
              </div>
           
          </div>
      </div>

@endsection
