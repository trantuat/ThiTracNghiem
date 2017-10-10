<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageQuizzController extends Controller
{
    public function showListOfQuizz(){
        $responseData = QuizzService::getInstance()->getAllQuizz();
        // var_dump($responseData->data);
        if ($responseData->error != null) {
            return view("student.manageQuizz",['error'=>$responseData->error ]);
        }
        return view("student.manageQuizz",['data'=>$responseData->data]);
    }
}
