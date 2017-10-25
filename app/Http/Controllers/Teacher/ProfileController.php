<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showProfile(){
        $responseData = QuizzService::getInstance()->getInfor();
        if ($responseData->error != null) {
            return view("teacher.profile",['error'=>$responseData->error]);
        }
        return view("teacher.profile",['data'=>$responseData->data]);
    }
    public function updateAccount(Request $request){
        // $v = Validator::make($request->all(), [
        //     'username' => 'required|AlphaNum|min:6|max:255', 
        //     'fullname' => 'min:6|max:50|regex:/^[\pL\s\-]+$/u',
        //     'phone' => 'numeric|digits_between:10,11',
        //     'address' =>'min:2|max:50',

        // ]);
        // if ($v->fails())
        // {
        //     return redirect()->back()->withErrors($v->errors());
            
        // }

        $address = $request->address;
        $phone = $request->phone;
        $fullname = $request->fullname;
        $birthday = $request->birthday;
        $username = $request->username;
        $gender = $request->gender;
        $responseData = QuizzService::getInstance()->updateAccount(['address'=>$address,'phone'=>$phone,'fullname'=>$fullname,'username'=>$username, 'gender'=>$gender,'birthday'=>$birthday]);
        // var_dump($responseData->data);
        if ($responseData->error != null) {
           return view("teacher.profile",['error'=>$responseData->error, 'update'=>1]);
        } else{
           session(['username' => $responseData->data['username']]);
        return view("teacher.profile",['data'=>$responseData->data, 'update'=>1]);
       }
    }
    public function updatePassword(Request $request){
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $responseData = QuizzService::getInstance()->updatePassword(['email'=>session('email',''),'old_password'=>$oldPassword,'new_password'=>$newPassword]);
        if ($responseData->error != null) {
        // return view("student.manageProfile",['data'=>$data,'update'=>0,'status'=>'Mật khẫu không đúng']);

            return json_encode("Lỗi");
        } else{
            return json_encode("Thành công");
        }
    }

}
