@extends('layouts.admin.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('head')
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckeditor\ckeditor.js") }}"></script>
  <script type="text/javascript" language = "javascript"  src="{{ URL::asset("editor\ckfinder\ckfinder.js") }}"></script>
  
@endsection
@section('title_page')
<title>Nội dung câu hỏi</title>
@endsection

@section('content')
      <div class="container-fluid">
        <div class="">
        <input type="hidden" id="questionId" value="{{$data[0]['answer'][0]['question_id']}}">
          <div class="card-header">
            <h4><i class="fa fa-asterisk"></i> NỘI DUNG CÂU HỎI</h4>
          </div>
          <div class="card-body"  style="margin-bottom: 40px;">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-4">
                <div class="row">
                  
                  <div class="control-label col-sm-4">
                    <h7 style="font-size:16px; margin-top:5px;"><b>Lớp</b></h7>
                  </div>
                  <div class="input-group col-sm-8">
                    <input type="text" name="checkClass" id="checkClass" class="form-control" value="{{$data[0]['class_id']}}"readonly>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="row">
                  <div class="control-label col-sm-4">
                    <h7 style="font-size:16px; margin-top:5px;"><b>Mức độ</b></h7>
                  </div>
                  <div class="input-group col-sm-8">
                    <input type="text" name="checkLevel" id="checkLevel" class="form-control" value="{{$data[0]['level_name']}}" readonly>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="row">
                  <div class="control-label col-sm-5">
                    <h7 style="margin-left:20px; font-size:16px; margin-top:5px;"><b>Môn học</b></h7>
                  </div>
                  <div class="input-group col-sm-7">
                    <input type="text" name="checkSubject" id="checkSubject" class="form-control" value="{{$data[0]['topic_name']}}" readonly>
                  </div> 
                </div>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="checkQuestion"><b>Câu hỏi</b></label>
              <Textarea class="form-control" id="checkQuestion" name="checkQuestion" cols="40" rows="3" readonly ><?php echo $data[0]['content']?></Textarea>
              <script>
                          CKEDITOR.replace( "checkQuestion",
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
                 
                 <?php 
                 $answer=$data[0]['answer'];
                  for($i=0;$i<$data[0]['number_answer'];$i++){
                    ?>
                
                  <div class="input-group" >
                      <span class="input-group-addon" style="border-bottom: none; border-radius: 0px;">
                        <input type="checkbox" aria-label="The right answer" id="<?php echo 'checkbox_answer'.$i ;?>" <?php if($answer[$i]['is_correct_answer']) echo "checked";?> disabled>
                      </span>
                      <input type="text" class="form-control"  value="Ðáp án đúng" style="border-bottom: none; border-radius: 0px;" readonly>
                    
                  </div>
                  <!-- //  <input type="text" class="form-control" id="answer1" > -->
                  <div class="form-group" style="border:1;">
                  <Textarea class="form-control" id="<?php echo 'answer'.$i ;?>"  name="<?php echo 'answer'.$i; ?>" readonly><?php echo $answer[$i]['content'];?></Textarea>
                  <script>
                          CKEDITOR.replace( "<?php echo 'answer'.$i ;?>",
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
                  <br>
                  <?php 
                    }
                    if($check==1){
                    
                  ?>
                    <center><button id="btnCheckQuestion" class="btn btn-success btnCheck" >Duyệt</button>
                    <?php 
                    $id=json_encode($questionId);
                    echo "<button id='btnUncheckedQuestion' class='btn btn-success btnUncheked' onclick='deleteQuestion($id)'>Không đạt</button>"; ?></center>
                  
                  <?php }?>
                </div>
              <br>
                
        </div>
      </div>

    
@endsection
