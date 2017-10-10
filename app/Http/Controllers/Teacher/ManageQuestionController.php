<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageQuestionController extends Controller
{
    public function showListOfQuestion(){
        $responseData = QuizzService::getInstance()->getListOfQuestion();
        // var_dump($responseData->data);
        if ($responseData->error != null) {
            return view("teacher.manageQuestion",['error'=>$responseData->error ]);
        }
        return view("teacher.manageQuestion",['data'=>$responseData->data]);
    }
    public function getSubject(Request $request){
        // console.log("abc");
        $classId=$request->classId;
        $responseData = QuizzService::getInstance()->getSubject($classId);
        $data=$responseData->data;
        $html="";
        if($data){
            foreach($data as $row){
                $text= htmlspecialchars($row['topic_name']);
                $html=$html."<option value='".$row["id"]."'>".$text."</option>";
            }
		} else{
        }
        return $html;
        
    }

    public function addQuestion(Request $request){
        $json=$request->sendJson;
        // return $json;
        $responseData = QuizzService::getInstance()->addQuestion($json);
        if ($responseData->error != null) {
                return json_encode($responseData->error);
        }
        return json_encode($responseData->data);
    }
}
