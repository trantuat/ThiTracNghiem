<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class AddNewQuestionController extends Controller
{
    public function showAddNewQuestion() {
        return view("teacher.addNewQuestion");
    }
}
