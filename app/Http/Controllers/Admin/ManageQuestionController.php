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

    public function getClassForUpdate(Request $request){
        $classId=$request->classId;
        $responseData = QuizzService::getInstance()->getAllClass();
        $data=$responseData->data;
        $html="";
        if($data){
            foreach($data as $row){
                $text= htmlspecialchars($row['class_name']);
                if ($row["id"]== $classId) {
                    $html=$html."<option value='".$row["id"]."' selected >".$text."</option>";
                } else {
                    $html=$html."<option value='".$row["id"]."' >".$text."</option>";
                }
                // $html=$html."<option value='".$row["id"]."'>".$text."</option>";
            }
		} else{
        }
        return $html;
    }

    public function getSubjectForUpdate(Request $request){
        $classId=$request->classId;
        $topicId=$request->topicId;
        $responseData = QuizzService::getInstance()->getSubject($classId);
        $data=$responseData->data;
        $html="";
        if($data){
            foreach($data as $row){
                $text= htmlspecialchars($row['topic_name']);
                if ($row["id"]== $topicId) {
                    $html=$html."<option value='".$row["id"]."' selected >".$text."</option>";
                } else {
                    $html=$html."<option value='".$row["id"]."' >".$text."</option>";
                }
                // $html=$html."<option value='".$row["id"]."'>".$text."</option>";
            }
		} else{
        }
        return $html;
        
    }

    public function getLevelForUpdate(Request $request){
        $levelId=$request->levelId;
        $responseData = QuizzService::getInstance()->getAllLevel();
        $data=$responseData->data;
        $html="";
        if($data){
            foreach($data as $row){
                $text= htmlspecialchars($row['level_name']);
                if ($row["id"]== $levelId) {
                    $html=$html."<option value='".$row["id"]."' selected >".$text."</option>";
                } else {
                    $html=$html."<option value='".$row["id"]."' >".$text."</option>";
                }
                // $html=$html."<option value='".$row["id"]."'>".$text."</option>";
            }
		} else{
        }
        return $html;
        
    }

    public function updateQuestion(Request $request){
        // $json=$request->sendJson;
        $updateAnswer=$request->updateAnswer;
      
        $responseData = QuizzService::getInstance()->updateAnswer($updateAnswer);

        if ($responseData->error != null) {
            return json_encode($responseData->error);
        } else{
            // echo $responseData->data;
            return json_encode($responseData->data);
        }
        
    }
    
}
