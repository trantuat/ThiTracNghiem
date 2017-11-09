<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageQuizzTemplateController extends Controller
{
    public function showQuizzTemplate(){
        return view("teacher.manageQuizzTemplate");
    }
}
