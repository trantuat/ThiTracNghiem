<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageUncheckedQuestionController extends Controller
{
    public function showListOfUncheckedQuestion(){
        return view('admin.manageUncheckedQuestion');
    }
}
