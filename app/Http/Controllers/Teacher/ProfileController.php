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
        $v = Validator::make($request->all(), [
            'username' => 'required|alpha|min:6|max:255', 
            'fullname' => 'min:6|max:50',
            'phone' => 'numeric|digits_between:10,11',
            'address' =>'min:2|max:50',

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $address = $request->address;
        $phone = $request->phone;
        $fullname = $request->fullname;
        $birthday = $request->birthday;
        $username = $request->username;
        $gender = $request->gender;

        // var_dump($request-);
        $responseData = QuizzService::getInstance()->updateAccount(['address'=>$address,'phone'=>$phone,'fullname'=>$fullname,'username'=>$username, 'gender'=>$gender,'birthday'=>'2017-10-06']);
        //diiecho($responseData->data);
        if ($responseData->error != null) {
           return view("teacher.profile",['error'=>$responseData->error, 'update'=>1]);
        } else{
           session(['username' => $responseData->data['username']]);
        return view("teacher.profile",['data'=>$responseData->data, 'update'=>1]);
       }
    }
    public function updatePassword(Request $request){
        $v = Validator::make($request->all(), [
            'oldPassword' => 'required', 
            'newPassword' => 'required|min:6|max:50',
            'confirmPassword' => 'required|min:6|max:50|same:newPassword'

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;
        $data = (array)json_decode($request->data);
        $data['info'] = (array)(json_decode(json_encode($data['info'])));

        $responseData = QuizzService::getInstance()->updatePassword(['email'=>session('email',''),'old_password'=>$oldPassword,'new_password'=>$newPassword]);
        if ($responseData->error != null) {
        return view("teacher.profile",['data'=>$data,'update'=>0,'status'=>'Mật khẫu không đúng']);
        }
        return view("teacher.profile",['data'=>$data, 'status'=>'Thay đổi mật khẩu thành công']);
        
    }

}
