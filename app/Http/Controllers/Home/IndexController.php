<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper; 

class IndexController extends Controller
{
    public function index() {
       
        return view("home.index");
    }
}
