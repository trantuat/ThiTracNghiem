


@extends('layouts.teacher.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('head')
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckeditor\ckeditor.js") }}"></script>
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckfinder\ckfinder.js") }}"></script>
  
@endsection

@section('title_page')
<title>Xem chi tiết câu hỏi</title>
@endsection
@section('content')

@if (isset($error)) 
    <script language='javascript'>
      alert(" {{ $error }}");
    </script>
    
@endif
      <div class="container-fluid">
            <div id="formUpdateQuestion" method="" class="form-horizontal" >
            {{ csrf_field() }}
              <div class="card-header">
                <div class="row">
                    <div class="col-sm-11">
                    <h5><i class="fa fa-ravelry"></i> NỘI DUNG CÂU HỎI</h5>
                    </div>
                </div>
              </div>
               <div class="card-body"  style="margin-bottom: 40px; padding-bottom: 80px;" >
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="row col-sm-4">
                        <input type="hidden" id="question_id" value="{{$data[0]['id']}}" disabled>
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                        </div>
                        <div class="col-sm-8">
                        <input type="hidden" id="class_id" value="{{$data[0]['class_id']}}" >
                          <select name="updateQuestionClass" id="updateQuestionClass" class="form-control" value="{{$data[0]['class_id']}}" disabled>
                            
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-4">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                        </div>
                        <div class="col-sm-8">
                          <input type="hidden" id="level_id" value="{{$data[0]['level_id']}}" >
                          <select name="updateQuestionLevel" id="updateQuestionLevel" class="form-control" disabled>
                            
                          </select>
                        </div>
                      </div>
                      <div class="row col-sm-4">
                        <div class="control-label col-sm-5">
                          <h7 style="font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                        </div>
                        <div class="col-sm-7">
                          <input type="hidden" id="topic_id" value="{{$data[0]['topic_id']}}" >
                          <select name="updateQuestionSubject" id="updateQuestionSubject" class="form-control" disabled>
                            
                          </select>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <br>
                  <div class="modal-body-answer">
                      <div class="form-group" >
                          <label for="updateQuestion"><b>Câu hỏi</b></label>
                              <Textarea class="form-control" id="questionContent"  name="questionContent" cols="40" rows="3" disabled><?php echo $data[0]['content']?></Textarea>
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
                          <div class="editor1" >
                          <div class="input-group" >
                             <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                               <input type="checkbox" aria-label="The right answer" id="<?php echo 'checkbox_answer'.$i ;?>" checked disabled>
                             </span>
                              <input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                            
                         </div>
                        <!-- //  <input type="text" class="form-control" id="answer1" > -->
                        <Textarea class="form-control" id="<?php echo 'answer'.$i ;?>"  name="<?php echo 'answer'.$i; ?>" disabled><?php echo $data[0]['answer'][$i]['content'];?></Textarea>
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
                        } else{
                    ?>
                    <div class="editor1" >
                    <div class="input-group" >
                       <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                         <input type="checkbox" aria-label="The right answer" id="<?php echo 'checkbox_answer'.$i ;?>" disabled>
                       </span>
                        <input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                      
                   </div>
                  <!-- //  <input type="text" class="form-control" id="answer1" > -->
                  <Textarea class="form-control" id="<?php echo 'answer'.$i ;?>"  name="<?php echo 'answer'.$i; ?>" disabled><?php echo $data[0]['answer'][$i]['content'];?></Textarea>
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
