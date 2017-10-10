<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class SeeResultTestController extends Controller
{
    public function showResult(Request $request){
        $historyId=$request->historyId;
        var_dump($historyId);
        // return view("student.seeResultTest");
    }
   
}
