<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageTeacherController extends Controller
{
    public function showListOfTeacher() {
        $responseData = QuizzService::getInstance()->getListOfUser("2");
        return view('admin.manageTeacher',['data'=>$responseData->data]);
    }
}
