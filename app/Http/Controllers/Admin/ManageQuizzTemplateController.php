<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageQuizzTemplateController extends Controller
{
    public function showQuizzTemplate(){
        $responseData = QuizzService::getInstance()->getQuizzTemplate();
        // var_dump($responseData->data);
        if ($responseData->error != null) {
            return view("admin.manageQuizzTemplate",['error'=>$responseData->error ]);
        }
        return view("admin.manageQuizzTemplate",['data'=>$responseData->data]);
    }

    public function createQuizzTemplate(Request $request){
        $quizz_name = $request->quizz_name;
        $duration = $request->duration;
        $level_id = $request->level_id;
        $class_id = $request->class_id;
        $topic_id = $request->topic_id;
        $total = $request->total;
        $responseData= QuizzService::getInstance()->createQuizzTemplate(['quizz_name'=>$quizz_name,'class_id'=>$class_id,'level_id'=>$level_id,'topic_id'=>$topic_id,'total'=>$total,'duration'=>$duration]);
        if ($responseData->error != null) {
            return json_encode("Tạo đề mẫu thất bại!");
        }
        return json_encode("Tạo đề mẫu thành công");
    }

    public function deleteQuizzTemplate(Request $request){
        $quizzTemplateId=$request->quizzTemplateId;
        $responseData= QuizzService::getInstance()->deleteQuizzTemplate($quizzTemplateId);
        if ($responseData->error != null) {
            return json_encode($responseData->error);
        }
        return json_encode($responseData->data);

    }

    public function getQuizzTemplateById(Request $request){
        $quizzTemplateId=$request->quizzTemplateId;
        $responseData= QuizzService::getInstance()->getQuizzTemplateById($quizzTemplateId);
        return json_encode($responseData->data);

    }

    public function updateQuizzTemplate(Request $request){
        $id=$request->templateId;
        $quizz_name = $request->quizz_name;
        $duration = $request->duration;
        $level_id = $request->level_id;
        $class_id = $request->class_id;
        $topic_id = $request->topic_id;
        $total = $request->total;
        $responseData= QuizzService::getInstance()->updateQuizzTemplate(['id'=>$id,'quizz_name'=>$quizz_name,'class_id'=>$class_id,'level_id'=>$level_id,'topic_id'=>$topic_id,'total'=>$total,'duration'=>$duration]);
        if ($responseData->error != null) {
            return json_encode($responseData->error);
        }
        return json_encode($responseData->data);
    }
}
