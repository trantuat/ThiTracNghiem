@extends('layouts.student.app')
@section('title_page')
<title>Làm bài thi</title>
@endsection
@section('content')
@if (isset($error)) 
<script language='javascript'>
  alert(" {{ $error }}");
</script>
@endif

<div class="container-fluid" >
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
                        <label><b>Question {{$i+1}}: {{$data[$i]['content']}}</b></label>
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
                                    <?php 
                                        $answer=$data[$i]['answer'];
                                        $multi=$data[$i]['is_multichoise'];
                                        for($j=0;$j<count($answer);$j++){
                                            $question_id=$answer[$j]['question_id'];
                                            // $id_check="radio".$j;
                                            $id_label="anwer".$j;
                                            if(!$multi){
                                                if($answer[$j]['is_correct_answer']==1){
                                                    if($answer[$j]['id']==$data[$i]['option_choose']['option_choose1']){
                                    ?>
                                                        <div class="form-group form-group_radio" id="<?php echo $question_id;?>" name="questionId">
                                                        
                                                            <input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>" checked disabled>
                                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                            <i class="fa fa-check" style="color:green;" aria-hidden="true"></i>
                                        
                                                        </div>
                                                        <br>
                                    <?php                } else{
                                    ?>
                                                            <div class="form-group form-group_radio" id="<?php echo $question_id;?>" name="questionId">
                                                            
                                                            <input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>"  disabled>
                                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                            <i class="fa fa-check" style="color:green;" aria-hidden="true"></i>
                                                            </div>
                                                            <br>       
                                    <?php                }
                                    
                                                }

                                                else{
                                                    if($answer[$j]['id']==$data[$i]['option_choose']['option_choose1']){
                                    ?>
                                                        <div class="form-group form-group_radio" id="<?php echo $question_id;?>" name="questionId">
                                                        
                                                        <input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>" checked disabled>
                                                        <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                        <i class="fa fa-times" style="color:red;" aria-hidden="true"></i>
                                                        </div>
                                                    <br>       
                                    <?php           } else{
                                    ?>
                                                        <div class="form-group form-group_radio" id="<?php echo $question_id;?>" name="questionId">
                                                        
                                                            <input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>" disabled>
                                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                        
                                                        </div>
                                                        <br>
                                    <?php
                                                    }
                                                }
                                        } else{ 
                                            $check=0;
                                            if($answer[$j]['is_correct_answer']==1){
                                                for($k=1;$k<=count($data[$i]['option_choose']);$k++){
                                                    if($answer[$j]['id']==$data[$i]['option_choose']['option_choose'.$k]){
                                    ?>
                                                        <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                            <input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>" checked disabled>
                                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                            <i class="fa fa-check" style="color:green;" aria-hidden="true"></i>
                                                        </div>
                                                        <br>

                                    <?php             
                                                    $check=1;
                                                    }
                                                }
                                                if($check==0){
                                    ?>
                                                <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                    <input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>"  disabled>
                                                    <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                    <i class="fa fa-check" style="color:green;" aria-hidden="true"></i>
                                                </div>
                                                <br>

                                    <?php       }
                                            } else{
                                                    for($k=1;$k<=count($data[$i]['option_choose']);$k++){
                                                        if($answer[$j]['id']==$data[$i]['option_choose']['option_choose'.$k]){
                                    ?>
                                                        <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                            <input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>" checked disabled>
                                                            <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                            <i class="fa fa-times" style="color:red;" aria-hidden="true"></i>
                                                        </div>
                                                        <br>

                                    <?php               $check=1; 
                                                        }
                                                    }
                                                    if($check==0){
                                    ?>
                                                <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                    <input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>" disabled>
                                                    <label id="<?php echo $id_label;?>">{{$answer[$j]['content']}}</label>
                                                </div>
                                                <br>

                                    <?php           }
                                                }
                                    
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php }?>
                 <br>
                   
           
            </div>
                
        </div>

    </div>
    
</div>




@endsection