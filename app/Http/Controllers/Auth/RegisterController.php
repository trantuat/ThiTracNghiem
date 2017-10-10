<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\CheckProfileRequest;
use Illuminate\Http\Request;
use App\Service\QuizzService;

class RegisterController extends Controller
{
    public function show() {
        return view("Auth.register");
    }

    public function register(Request $request) {
        $v = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'email' =>'required|email',
            'password' =>'required|min:6|max:25',
            'confirmPassword' =>'required|min:6|max:25|same:password'

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $username = $request->username;
        $password = $request->password;
        $role = $request->role;
        $email = $request->email;
        $gender = $request->gender;
        $address = $request->address;
        $phone = $request->phone;
        $birthday = $request->dayOfBirth;
        $fullname = $request->fullname;

        $responseData = QuizzService::getInstance()->register(['address'=>$address,
                                                                'phone'=>$phone,
                                                                'fullname'=>$fullname, 
                                                                'gender'=>$gender,
                                                                'birthday'=>$birthday, 
                                                                'username'=>$username,
                                                                'password'=>$password,
                                                                'email'=>$email,
                                                                'role'=>$role]);

        if ($responseData->error != null) {
            return redirect()->back()->with(['error'=>'Email đã tồn tại']);
        } else{
            return redirect("Login")->with(['registerStatus'=>"Đăng ký thành công!"]);
        }
        
        //  return view("Auth.login");return view("Auth.login");
    }
}
