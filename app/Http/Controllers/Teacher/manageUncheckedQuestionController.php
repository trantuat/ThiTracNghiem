<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageUncheckedQuestionController extends Controller
{
    public function showListOfUncheckedQuestion(){
        // $responseData = QuizzService::getInstance()->getListOfQuestion(session('user_id',0));
        // // var_dump($responseData->data);
        // if ($responseData->error != null) {
        //     return view("teacher.manageQuestion",['error'=>$responseData->error ]);
        // }
        // return view("teacher.manageQuestion",['data'=>$responseData->data]);
        return view("teacher.manageUncheckedQuestion");
    }
}
