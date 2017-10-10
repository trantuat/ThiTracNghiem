<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() 
    {
        // QuizzService::getInstance()->login('tranvantuat@gmail.com','123', function($responseData){
        //     echo $responseData->data." with ".$responseData->statusCode;
        // });
        return view("student.index");
    }
}
