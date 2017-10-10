<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Service\QuizzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function show() {
        return view("Auth.login", ['error'=>null]);
    }
    public function login(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' =>'required|email',
            'password' =>'required|min:6|max:25'

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $email = $request->email;
        $password = $request->password;
        $responseData = QuizzService::getInstance()->login($email,$password);
        if($responseData->error != null) {
            return redirect()->back()->with(['error'=>'Email hoặc mật khẩu không đúng']);
        }

        $role = $responseData->data['roles']['id'];
        session(['api_token' => $responseData->data['api_token'],'user_id'=>$responseData->data['id'], 'role'=> $role, 'username'=>$responseData->data['username'], 'email'=>$responseData->data['email']]);
        switch ($role) {
            case 1:
                return redirect()->route("Students"); 
                break;
            case 2: 
                return redirect()->route("Teachers"); 
                break;
            case 3: 
                return redirect()->route("Admins"); 
                break;
            default:
                break;
        }
    }

}
