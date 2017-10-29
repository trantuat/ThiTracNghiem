<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper; 
use App\Service\QuizzService;

class IndexController extends Controller
{
    public function index() {
        $responseData = QuizzService::getInstance()->getAllTopic();
        return view("home.index",["data"=>$responseData->data]);
    }
}
