<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageTeacherController extends Controller
{
    public function showListOfTeacher() {
        return view('admin.manageTeacher');
    }
}
