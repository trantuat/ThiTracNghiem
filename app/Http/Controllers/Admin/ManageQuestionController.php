<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageQuestionController extends Controller
{
    public function showListOfQuestion(){
        return view('admin.manageQuestion');
    }
    
}
