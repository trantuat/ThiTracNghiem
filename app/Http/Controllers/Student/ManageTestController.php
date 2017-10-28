<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageTestController extends Controller
{
    public function createQuizz(Request $request){
        $quizz_name=$request->doTestQuizzName;
        $class_id=$request->doTestClass;
        $level_id=$request->doTestLevel;
        $topic_id=$request->doTestSubject;
        $total=$request->doTestTotal;
        $duration=$request->doTestTime;
        if ($topic_id== null) {
            return redirect()->back()->with(['error_create_quiz'=>"Chưa có môn trong lớp này."]);
        } 
        $responseData= QuizzService::getInstance()->createQuizz(['quizz_name'=>$quizz_name,'class_id'=>$class_id,'level_id'=>$level_id,'topic_id'=>$topic_id,'total'=>$total,'duration'=>$duration]);
        if ($responseData->error != null) {
            return redirect()->back()->with(['error_create_quiz'=>"Không đủ số lượng câu hỏi."]);
        } 
        $quizzId=$responseData->data['quiz_id'];

        $responseTest= QuizzService::getInstance()->doTest($quizzId);

        if($responseTest->error!=null){
            return view("student.doTest",['error'=>$responseTest->error]);
        } else{
            return view("student.doTest",['data'=>$responseTest->data,'quizzId'=>$quizzId,'duration'=>$duration]);
        }

    }
}
