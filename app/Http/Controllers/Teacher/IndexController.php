<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class IndexController extends Controller
{
    public function index() 
    {
        $responsePublic = QuizzService::getInstance()->getNumberQuestionPublicByTeacher();
        $responseNonPublic =QuizzService::getInstance()->getNumberQuestionNonPublicByTeacher();
       return view("teacher.index",["public"=>$responsePublic->data,"nonpublic"=>$responseNonPublic->data]);
    }
}
