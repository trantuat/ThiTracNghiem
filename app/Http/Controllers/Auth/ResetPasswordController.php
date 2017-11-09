<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Service\QuizzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function show() {
        return view("auth.resetPassword", ['error'=>null]);
    }
    
    public function reset(Request $request)
    {
        $email = $request->email;
        $responseData = QuizzService::getInstance()->resetPassword($email);
        $html="";
        if($responseData->error == null) {
            $html= "<div class='alert alert-success alert-dismissible fade show'>
                    <strong>Mật khẩu mới đã được gửi tới email của bạn. Kiểm tra email của bạn để lấy lại mật khẩu. </strong>
                 </div>";
        } else {
            $html= "<div class='alert alert-danger alert-dismissible fade show'>
                   <strong>Email không tồn tại.  </strong>
                  </div>";
        }
        return $html;
    }

}


// @if (isset($success))
// @if  ($update == 1) 
//    <div class='alert alert-success alert-dismissible fade show'>
//      <strong>Mật khẩu mới đã được gửi tới email của bạn. Kiểm tra email của ban để lấy lại mật khẩu. </strong>
//    </div>
// @else 
//    <div class='alert alert-success alert-dismissible fade show'>
//      <strong>Email không tồn tại.  </strong>
//    </div>
// @endif
// @endif