@extends('layouts.student.app')

@section('title_page')
<title>Làm bài thi</title>
@endsection
@section('head')
<script language='javascript'>
    window.addEventListener('load',function(){
        history.pushState(null,null,window.location.pathname);
    });
    window.addEventListener('popstate',function(){
        var oldUrl =  document.referrer;
        if (oldUrl.search("/Students/DoTest") > 0) {
            window.location.href = "/Students";
        }
    });
</script>
@endsection
@section('content')
@if (isset($error)) 
<script language='javascript'>
  alert(" {{ $error }}");
</script>
@endif

<div class="content-wrapper">
<div class="container-fluid" >
    <input type="hidden" id="numberQuestion" name="numberQuestion" value="{{ count($data)}}">
    <div class="row col-sm-12">
        <div class="col-sm-1">
        </div>
        <div class='alert alert-danger alert-dismissible fade show col-sm-10' style="margin-top:10px;margin-left:10px;">
        <div class="row">
            <div class="col-sm-8">
                <label><b>Thời gian bắt đầu:</b> {{$data[0]['start_time']}}</label>
            </div>
            <div class="col-sm-4">
                <label><b>Thời gian kết thúc:</b> {{$data[0]['end_time']}}</label>
            </div>
        </div>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
    
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
                                                    <div class="form-group form-group_radio" id="<?php echo $question_id; ?>" name="questionId">
                                                        <table>
                                                            <td style= "width: 20px; vertical-align:top"><input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>" checked disabled></td>
                                                            <td><?php echo $answer[$j]['content'];?></td>
                                                           <td style= "width: 10px; vertical-align:top"><i class="fa fa-check" style="color:green;" aria-hidden="true"></i></td>
                                                        </table>
                                                    </div>
                                    <?php                } else{
                                    ?>
                                                        <div class="form-group form-group_radio" id="<?php echo $question_id; ?>" name="questionId">
                                                            <table>
                                                                 <td style= "width: 20px; vertical-align:top"><input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>"  disabled></td>
                                                                    <td><?php echo $answer[$j]['content'];?></td>
                                                                    <td style= "width: 10px; vertical-align:top"><i class="fa fa-check" style="color:green;" aria-hidden="true"></i></td>
                                                             </table>
                                                        </div>
                                    <?php                }
                                    
                                                }

                                                else{
                                                    if($answer[$j]['id']==$data[$i]['option_choose']['option_choose1']){
                                    ?>
                                                    <div class="form-group form-group_radio" id="<?php echo $question_id; ?>" name="questionId">    
                                                        <table>
                                                           <td style= "width: 20px; vertical-align:top"><input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>" checked disabled></td>
                                                           <td><?php echo $answer[$j]['content'];?></td>
                                                           <td style= "width: 20px; vertical-align:top"><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></td>
                                                        </table>
                                                    </div>     
                                    <?php           } else{
                                    ?>
                                                        <div class="form-group form-group_radio" id="<?php echo $question_id;?>" name="questionId">
                                                            <table>
                                                                <td style= "width: 20px; vertical-align:top"><input type="radio" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>" disabled></td>
                                                                <td><?php echo $answer[$j]['content'];?></td>
                                                            </table>
                                                        
                                                        </div>
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
                                                            <table>
                                                                <td style= "width: 20px; vertical-align:top"><input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>" checked disabled></td>
                                                                <td><?php echo $answer[$j]['content'];?></td>
                                                                <td style= "width: 20px; vertical-align:top"><i class="fa fa-check" style="color:green;" aria-hidden="true"></i></td>
                                                            </table>
                                                            
                                                        </div>

                                    <?php             
                                                    $check=1;
                                                    }
                                                }
                                                if($check==0){
                                    ?>
                                                <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                   
                                                    <table>
                                                        <td style= "width: 20px; vertical-align:top"><input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" id="<?php echo 'radio'.$i; ?>" name="<?php echo 'question'.$i; ?>"  disabled></td>
                                                       <td><?php echo $answer[$j]['content'];?></td>
                                                       <td style= "width: 20px; vertical-align:top; align: center;"><i class="fa fa-check" style="color:green;" aria-hidden="true"></i></td>
                                                    </table>
                                                </div>

                                    <?php       }
                                            } else{
                                                    for($k=1;$k<=count($data[$i]['option_choose']);$k++){
                                                        if($answer[$j]['id']==$data[$i]['option_choose']['option_choose'.$k]){
                                    ?>
                                                        <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                            <table>
                                                                <td style= "width: 20px; vertical-align:top"><input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>" checked disabled></td>
                                                                <td><?php echo $answer[$j]['content'];?></td>
                                                                <td style= "width: 20px; vertical-align:top; align: center;"><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></td>
                                                            </table>
                                                        </div>
                                                        
                                    <?php               $check=1; 
                                                        }
                                                    }
                                                    if($check==0){
                                    ?>
                                                <div class="form-group form-group_checkbox" id="<?php echo $question_id; ?>" name="questionId">
                                                    <table>
                                                        <td style= "width: 20px; vertical-align:top"><input type="checkbox" aria-label="The right answer" value="<?php echo $answer[$j]['id'];?>" name="<?php echo 'question'.$i; ?>" id="<?php echo 'checkbox'.$j; ?>" disabled></td>
                                                        <td><?php echo $answer[$j]['content'];?></td>
                                                    </table>
                                                </div>

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
</div>




@endsection