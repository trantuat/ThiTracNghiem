<?php
    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Requests;
    use App\Service\QuizzService; 
    
    class IndexController extends Controller
    {
        public function index() 
        {       
            $responseTop10 = QuizzService::getInstance()->top10score();
            $responseTeacher=QuizzService::getInstance()->getNumberTeacher();
            $responseStudent=QuizzService::getInstance()->getNumberTeacher();
            $responseQuizz=QuizzService::getInstance()->getNumberQuizz();
            $responseQuestion=QuizzService::getInstance()->getNumberQuestion();
            return view("admin.index",['top10'=>$responseTop10->data,'teacher'=>$responseTeacher->data,'student'=>$responseStudent->data,'quizz'=>$responseQuizz->data,'question'=>$responseQuestion->data]);
        }
    }
?>