<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class DoTestController extends Controller
{
    public function doTest(Request $request){
        $quizzId=$request->quizzId;
        $duration=$request->duration;
        $responseData = QuizzService::getInstance()->doTest($quizzId);
        
        return view("student.doTest",['data'=>$responseData->data,'quizzId'=>$quizzId,'duration'=>$duration]);
    }
    public function submitQuizz(Request $request){
        $json=$request->sendJson;
        // $quizzId=$request->quizzId;
        // return json_encode($quizzId);
        $responseData['history_id']= QuizzService::getInstance()->submitQuizz($json);
        if($responseData['history_id']->data!=null){
            $responseDataScore= QuizzService::getInstance()->getQuizzScore($responseData['history_id']->data);
        }
        $responseData['result']=$responseDataScore->data;
        return json_encode($responseData);

    }
}
