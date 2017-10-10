<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class LogoutController extends Controller
{
    public function logout()
    {
        $responseData = QuizzService::getInstance()->logout();
        if($responseData->error != null) {
            return redirect()->back()->with(['error'=>'Loi']);
        }
        session(['api_token' => null,'user_id'=>null]);
        return redirect()->route("home"); 
    }
}
