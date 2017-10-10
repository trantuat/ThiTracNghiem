@extends('layouts.student.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Làm bài thi</title>
@endsection
@section('content')

<div class="container-fluid" >
    <div id="clocktimer" style="font-size:40px; float:right" class="clock">
        <div>
            <span id="timer"></span>
            <div class="smalltext"><b>Remaining time</b></div>
        </div>
    </div>
    <input type="hidden" id="quizzId" name="quizzId" value="{{ $quizzId}}">
    <input type="hidden" id="numberQuestion" name="numberQuestion" value="{{ count($data)}}">
    
    
    <div class="row" >
    
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
            <div class="form-horizontal quizzPages">
            {!! csrf_field() !!}
                <? 
                for($i=0;$i<count($data);$i++){
                
                ?>
            
                <div class="card mb-3" style="background-color:#EEEEEE;">
                    <div class="card-body" id="questionContent">
                        <label><b>Question {{$i}}: {{$data[$i]['content']}}</b></label>
                    </div>
                    <div class="row">
                        <div class="col-lg-3" style="text-align:center; "><b>
                            <?php
                             if(!$data[$i]['is_multichoise']){
                                $num=1;
                                echo "Chọn một đáp án";  
                             }
                            else{
                                $num=2;
                                echo "Chọn nhiều đáp án";
                            }
                            ?></b>
                        </div>
                        <div class="col-lg-9">
                            <div class="card mb-3">
                                <div class="card-body <?php echo 'question'.$i; ?>">
                                    <input type="hidden" id="<?php echo 'questionId'.$i ;?>" value="{{ $data[$i]['question_id'] }}">
                                    <input type="hidden" id="<?php echo 'numberAnswer'.$i ;?>" value="{{ $data[$i]['number_answer'] }}">
                                    <?php 
                                        $answer=$data[$i]['answer'];
                                        $multi=$data[$i]['is_multichoise'];
                                        for($j=0;$j<$data[$i]['number_answer'];$j++){
                                            $question_id=$answer[$j]['question_id'];
                                            // $id_check="radio".$j;
                                            $id_label="anwer".$j;
                                            if(!$multi){
                                    ?>
                                   
                                        <div class="form-group form-group_radio" id="<?php echo $question_id;?>" name="questionId">
                                            <input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>">
                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                        </div>
                                        <br>
                                        <?php
                                        } else{ ?>
                                        <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                            <input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>">
                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                        </div>
                                        <br>
                                        <input type="hidden" class = "mutiquestion" value = "<?php echo $multi; ?>">
                                       <?php }
                                        }?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php }?>
                 <br>
                    <center>
                        <!-- <input type = "submit" class="btn col-sm-2 btn-danger" id="btnSubmitTest" value="Submit"> -->
                        <button class="btn col-sm-2 btn-danger" id="btnSubmitTest" >Submit</button>                                
                    </center>
                </br>
           
            </div>
                <div class="col-sm-1">
                </div>
        </div>

    </div>
    
</div>


<div class="modal fade" id="showResultQuizz" role="dialog">
      <div class="modal-dialog " style="width:500px;max-width: 100%;">
         <!-- Modal content-->
         <div class="modal-content">
            <input type="hidden" id="historyId" >
            <!-- <form id="formShowResult" method="" class="form-horizontal" > -->
            {{ csrf_field() }}
                <div class="modal-header">
                  <h4 class="modal-tittle">KẾT QUẢ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <div class="modal-body" >
                    <div class="col-sm-4">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        <strong>
                                <label>Số câu đúng</label>
                                <br>
                                <label>Số câu sai</label>
                                <br>
                                <label>Điểm số</label>
                                <br>
                        </strong>
                        </div>
                        <div class="col-sm-4">
                            <label for="correctAnswer" id="correctAnswer"></label>
                            <br>
                            <label for="wrongAnswer" id="wrongAnswer"></label>
                            <br>
                            <label for="point" id="point"></label>
                            <br>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>
              </div>
             <div class="modal-footer">
                <!-- <a href="{{ url('/Students/Result', 1) }}" class="btn btn-success">Xem chi tiết</a> -->
                <button id="btnDetailResult" class="btn btn-success" >Xem chi tiết</button>
                <button class="btn btn-default btn-close-popup" data-dismiss="modal">Cancel</button>
             </div>
          </form>
        </div>
      </div>
  </div>

@endsection