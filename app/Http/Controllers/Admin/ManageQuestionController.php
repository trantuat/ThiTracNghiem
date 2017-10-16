<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageQuestionController extends Controller
{
    public function showAllQuestionPublic(){
        $responseData = QuizzService::getInstance()->getAllQuestionPublicByAdmin();
        // var_dump($responseData->data);
        return view('admin.manageQuestion',['data'=>$responseData->data]);
    }
    public function showDetailQuestion(Request $request) {
        $question_id=$request->id;
        $responseData=QuizzService::getInstance()->showDetailQuestion($question_id);
        // var_dump($responseData->data);
        if($responseData->error!=null){
            return redirect()->back()->with(['error'=>"Đã xảy ra lỗi"]);
        }
        return view('admin.seeDetailQuestion',['data'=>$responseData->data,'check'=>0]);
    }
    
}
