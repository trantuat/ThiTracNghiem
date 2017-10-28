<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class IndexController extends Controller
{
    public function index() 
    {
        return view("student.index");
    }

    public function getClassBySubjectId(Request $request){
        $topicId=$request->topicId;
        $responseData = QuizzService::getInstance()->getClassBySubjectId($topicId);
        $data=$responseData->data;
        var_dump($data);
        $html="";
        if($data){
            foreach($data as $row){
                $text= htmlspecialchars($row['class_name']);
                $html=$html."<option value='".$row["id"]."' >".$text."</option>";
            }
		} else{
        }
        return $html;
    }
}
