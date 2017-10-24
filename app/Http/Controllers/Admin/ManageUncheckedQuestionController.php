<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageUncheckedQuestionController extends Controller
{
    public function showAllQuestionNonPublic(){
        $responseData = QuizzService::getInstance()->getAllQuestionNonPublicByAdmin();
        // var_dump($responseData->data);
        return view('admin.manageUncheckedQuestion',['data'=>$responseData->data]);
    }

    public function showDetailQuestion(Request $request) {
        $question_id=$request->id;
        $responseData=QuizzService::getInstance()->showDetailQuestion($question_id);
        // var_dump($responseData->data);
        if($responseData->error!=null){
            return redirect()->back()->with(['error'=>"Đã xảy ra lỗi"]);
        }
        return view('admin.seeDetailQuestion',['data'=>$responseData->data,'check'=>1,'questionId'=>$responseData->data[0]['answer'][0]['question_id']]);
    }

    public function checkQuestion(Request $request){
        $question_id=$request->questionId;
        $responseData=QuizzService::getInstance()->checkQuestion($question_id);
        if ($responseData->error != null) {
            return json_encode($responseData->error);
        } 
        return json_encode($responseData);
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
