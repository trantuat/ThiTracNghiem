<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageQuizzTemplateController extends Controller
{
    public function showQuizzTemplate(){
        $responseData = QuizzService::getInstance()->getQuizzTemplate();
        // var_dump($responseData->data);
        if ($responseData->error != null) {
            return view("student.manageQuizzTemplate",['error'=>$responseData->error ]);
        }
        return view("student.manageQuizzTemplate",['data'=>$responseData->data]);
    }

    public function createQuizzFromTemplate(Request $request){
        $quizz_name=$request->doTestQuizzName;
        $class_id=$request->doTestClass;
        $level_id=$request->doTestLevel;
        $topic_id=$request->doTestSubject;
        $total=$request->doTestTotal;
        $duration=$request->doTestTime;
        // if($responseData->error != null){
        //     return json_encode("error");
        // }
        $responseData= QuizzService::getInstance()->createQuizz(['quizz_name'=>$quizz_name,'class_id'=>$class_id,'level_id'=>$level_id,'topic_id'=>$topic_id,'total'=>$total,'duration'=>$duration]);
        if ($responseData->error != null) {
            return json_encode("error");
        } 
        $quizzId=$responseData->data['quiz_id'];
        // $responseTest= QuizzService::getInstance()->doTest($quizzId);

        // if($responseTest->error!=null){
        //     return view("student.doTest",['error'=>$responseTest->error]);
        // } else{
        //     return view("student.doTest",['data'=>$responseTest->data,'quizzId'=>$quizzId,'duration'=>$duration]);
        // }
        return json_encode($quizzId);

    }
}
