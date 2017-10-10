<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageStudentController extends Controller
{
    public function showListOfStudent() {

        return view('admin.manageStudent');
    }
}
