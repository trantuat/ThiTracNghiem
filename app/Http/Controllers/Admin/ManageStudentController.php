<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageStudentController extends Controller
{
    public function showListOfStudent() {
        $responseData = QuizzService::getInstance()->getListOfUser("1");
        // var_dump($responseData->data);
        return view('admin.manageStudent',['data'=>$responseData->data]);
    }
}
