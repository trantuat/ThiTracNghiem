<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageNonPublicQuestionController extends Controller
{
    public function showQuestionNonPublicByTeacher(){
        $responseData = QuizzService::getInstance()->getQuestionNonPublicByTeacher();
        // var_dump($responseData->data);
        if ($responseData->error != null) {
            return view("teacher.manageNonPublicQuestion",['error'=>$responseData->error ]);
        }
        // return view("teacher.manageQuestion",['data'=>$responseData->data]);
        return view("teacher.manageNonPublicQuestion",['data'=>$responseData->data]);
    }

    public function deleteQuestion(Request $request){
        $questionId=$request->questionId;
        $responseData= QuizzService::getInstance()->deleteQuestion($questionId);
        if ($responseData->error != null) {
            return json_encode($responseData->error);
        } 
         return json_encode($responseData->data);
        
    }

    
}
