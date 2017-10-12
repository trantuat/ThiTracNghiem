<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class SeeResultTestController extends Controller
{
    public function showResult(Request $request){
        $historyId=$request->historyId;
        $responseData = QuizzService::getInstance()->getResultTest($historyId);
        if ($responseData->error != null) {
            return view("student.seeResultTest",['error'=>$responseData->error ]);
        }
        return view("student.seeResultTest",['data'=>$responseData->data]);
    }
   
}
