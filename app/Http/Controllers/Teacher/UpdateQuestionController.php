<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class UpdateQuestionController extends Controller
{
    public function showUpdateQuestion() {
        return view("teacher.updateQuestion");
    }
}
