<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageQuizzTemplateController extends Controller
{
    public function showQuizzTemplate(){
        return view("student.manageQuizzTemplate");
    }
}
