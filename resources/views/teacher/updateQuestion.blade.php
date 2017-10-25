


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
      <input type="hidden" id="question_id" value="{{$data[0]['answer'][0]['question_id']}}">
            <div id="formUpdateQuestion" method="" class="form-horizontal">
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
                        <input type="hidden" id="class_id" value="{{$data[0]['class_id']}}">
                          <select name="updateQuestionClass" id="updateQuestionClass" class="form-control" value="{{$data[0]['class_id']}}">
                            
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                        </div>
                        <div class="col-sm-8">
                          <input type="hidden" id="level_id" value="{{$data[0]['level_id']}}">
                          <select name="updateQuestionLevel" id="updateQuestionLevel" class="form-control" >
                            
                          </select>
                        </div>
                      </div>
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-5">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="col-sm-7">
                          <input type="hidden" id="topic_id" value="{{$data[0]['topic_id']}}">
                          <select name="updateQuestionSubject" id="updateQuestionSubject" class="form-control" >
                            
                          </select>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <br>
                  <div class="modal-body-answer">
                      <div class="form-group" >
                          <label for="updateQuestion"><b>Câu hỏi</b></label>
                              <Textarea class="form-control" id="questionContent"  name="questionContent" cols="40" rows="3"><?php echo $data[0]['content']?></Textarea>
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
                   <div class="updateMoreAnswer" id="updateMoreAnswer"> 
                   <?php 
                      for($i=0;$i<$data[0]['number_answer'];$i++){
                        if($data[0]['answer'][$i]['is_correct_answer']==1){
                    ?>
                          <div class="<?php echo 'editor'.$i ?>" >
                            <div class="input-group" >
                             <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                               <input type="checkbox" aria-label="The right answer" id="<?php echo 'checkbox_answer'.$i ;?>" checked>
                             </span>
                              <input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" id ="<?php echo 'editor'.$i ?>" onclick="deleteAnswer(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button>
                            </span>
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" name="addAnswerForUpdate" id="addAnswerForUpdate" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button>
                            </span>
                         </div>
                        <!-- //  <input type="text" class="form-control" id="answer1" > -->
                        <Textarea class="form-control" id="<?php echo 'answer'.$i ;?>"  name="<?php echo 'answer'.$i; ?>"><?php echo $data[0]['answer'][$i]['content'];?></Textarea>
                        <input type="hidden" id="<?php echo 'answer_id'.$i ?>" value="{{$data[0]['answer'][$i]['id']}}">
                          <script>
                           CKEDITOR.replace( "<?php echo 'answer'.$i ?>",
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
                    <?php 
                        } else{
                    ?>
                    <div class="<?php echo 'editor'.$i ?>" >
                    <div class="input-group" >
                       <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                         <input type="checkbox" aria-label="The right answer" id="<?php echo 'checkbox_answer'.$i ;?>" >
                       </span>
                        <input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                      <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button" id ="<?php echo 'editor'.$i ?>" onclick="deleteAnswerUpdate(this.id)" style="height: 38px; border-bottom: none; border-radius: 0px; background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_delete.png" ></button>
                      </span>
                      <span class="input-group-btn">
                          <button class="btn btn-secondary" name="addAnswerForUpdate" id="addAnswerForUpdate" style="height: 38px; border-bottom: none; border-radius: 0px;  background-color: #e9ecef; border-color: rgba(0,0,0,.15);" ><img src="/img/ic_add.png" ></button>
                      </span>
                   </div>
                  <!-- //  <input type="text" class="form-control" id="answer1" > -->
                  <Textarea class="form-control" id="<?php echo 'answer'.$i ;?>"  name="<?php echo 'answer'.$i; ?>"><?php echo $data[0]['answer'][$i]['content'];?></Textarea>
                  <input type="hidden" id="<?php echo 'answer_id'.$i ?>" value="{{$data[0]['answer'][$i]['id']}}">
                  <script>
                     CKEDITOR.replace( "<?php echo 'answer'.$i; ?>",
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
                 <?php
                        }
                      }
                   ?>
                   </div>
                      <input type="hidden" id="numberOfAnswerUpdate" name="numberOfAnswerUpdate" value="<?php echo $data[0]['number_answer'];?>">
                    </div>
                     <center><input type="submit" id="btnUpdateQuestion" class="btn btn-success btnUpdate" value='CẬP NHẬT CÂU HỎI' style="margin-top: 20px;"></center>
                     
              </div>
           
          </div>
      </div>


  <script language='javascript'>
      window.addEventListener('load',function(){
        loadClassForUpdate();
        loadSubjectForUpdate();
        loadLevelForUpdate();
      });
  </script>

@endsection
