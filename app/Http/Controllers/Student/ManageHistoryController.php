<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageHistoryController extends Controller
{
    public function showHistory(){
        $responseData = QuizzService::getInstance()->getHistory();
        // var_dump($responseData);
        if ($responseData->error != null) {
            return view("student.manageHistory",['error'=>$responseData->error ]);
        }
        return view("student.manageHistory",['data'=>$responseData->data]);
       
    }
    public function showTestTime(Request $request){
        $quizzId=$request->quizzId;
        $responseData = QuizzService::getInstance()->getTestTime($quizzId);
        // var_dump($responseData);
        if ($responseData->error != null) {
            return view("student.seeTestTime",['error'=>$responseData->error ]);
        }
        return view("student.seeTestTime",['data'=>$responseData->data,'quizzId'=>$quizzId,'duration'=>$responseData->data[0]['duration']]);
       
    }
}
