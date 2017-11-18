@extends('layouts.student.app')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('title_page')
<title>Làm bài thi</title>
@endsection

@section('head')
<script language='javascript'>
    window.addEventListener('load',function(){
        history.pushState(null,null,window.location.pathname);
    });
    window.addEventListener('popstate',function(){
        if (!window.confirm("Bạn có chắc chắc muốn thoát không")) {
            history.pushState(null,null,window.location.pathname);
        }  else {
            window.location.href = "/Students/Quizz";
        }
       
    });
    window.onbeforeunload = function() {
        return "";
    }
</script>
@endsection
@section('content')

@if (isset($error)) 
<script language='javascript'>
  alert("{{ $error }}");
</script>


@endif

<input type="hidden" id="startTime" value="<?php echo date('Y-m-d H:i:s')?>">
<div class="content-wrapper">
<div class="container-fluid" >

    <div id="clocktimer" style="font-size:40px; float:right" class="clock">
        <div>
            <!-- @if(isset($duration)) -->
            <span id="timer">{{$duration}}:00</span>
            <div class="smalltext"><b>Remaining time</b></div>
            <!-- @endif -->
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
                <?php  
                for($i=0;$i<count($data);$i++){
                
                ?>
            
                <div class="card mb-3" style="background-color:#d4edda;">
                    <div class="card-body" id="questionContent">
                        <table>
                            <td style= "width: 80px; vertical-align:top"><b>Câu {{$i+1}}:</td>
                            <td><?php echo $data[$i]['content'];?></td>
                        </table>
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
                                            <table>
                                                <td style= "width: 20px; vertical-align:top;"><input style= "margin-top:5px;" type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>"></td>
                                                <td style= "vertical-align:top"><?php echo $answer[$j]['content'];?></td>
                                            </table>
                                        </div>
                                        <br>
                                        <?php
                                        } else{ ?>
                                      
                                        <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                           
                                            <table>
                                                <td style= "width: 20px; vertical-align:top;"> <input style= "margin-top:5px;" type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>"></td>
                                                <td style= "vertical-align:top"><?php echo $answer[$j]['content'];?></td>
                                          </table>
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
                        <button class="btn col-sm-2 btn-success" id="btnSubmitTest" >Nộp bài</button>                                
                    </center>
                </br>
           
            </div>
                <div class="col-sm-1">
                </div>
        </div>

    </div>
    
</div>
</div>


<div class="modal fade" id="showResultQuizz" role="dialog">
      <div class="modal-dialog " style="width:500px;max-width: 100%;">
         <!-- Modal content-->
         <div class="modal-content">
            <input type="hidden" id="historyId" >
           
            <!-- <form id="formShowResult" action="/Students/Result" class="form-horizontal" > -->
            {{ csrf_field() }}
                <div class="modal-header">
                  <h4 class="modal-tittle">KẾT QUẢ</h4>
                </div>
               <div class="modal-body" >
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-4">
                            <!-- <div class="row"> -->
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
                        <!-- </div> -->
                        <div class="col-sm-3">
                        </div>
                    </div>
              </div>
              
             <div class="modal-footer">
                <button id="btnDetailResult" class="btn btn-success" >Xem chi tiết</button>
                <a href="/Students/Quizz"><button class="btn btn-secondary">Cancel</button></a>
             </div>
             <!-- </form> -->
        </div>
      </div>
  </div>

@endsection