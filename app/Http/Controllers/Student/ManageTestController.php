<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageTestController extends Controller
{
    public function showTest(){
        return view("student.manageTest");
    }
}
