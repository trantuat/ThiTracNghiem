<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckProfileRequest;
use App\Service\QuizzService;
use Illuminate\Support\Facades\Validator;

class ManageProfileController extends Controller
{
    public function showProfile(){
        $responseData = QuizzService::getInstance()->getInfor();
        if ($responseData->error != null) {
            return view("student.manageProfile",['error'=>$responseData->error,'update'=>0]);
        }
        return view("student.manageProfile",['data'=>$responseData->data,'update'=>0]);
    }

  
   
    public function updateAccount(Request $request){
        $v = Validator::make($request->all(), [
            'username' => 'required|AlphaNum|min:6|max:255', 
            'fullname' => 'min:6|max:50|regex:/^[\pL\s\-]+$/u',
            'phone' => 'numeric|digits_between:10,11',
            'address' =>'min:2|max:50',

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
            // return back()->withInput()->withError($v->errors());
        }

        $address = $request->address;
        $phone = $request->phone;
        $fullname = $request->fullname;
        $birthday = $request->birthday;
        $username = $request->username;
        $gender = $request->gender;
        $responseData = QuizzService::getInstance()->updateAccount(['address'=>$address,'phone'=>$phone,'fullname'=>$fullname,'username'=>$username, 'gender'=>$gender,'birthday'=>$birthday]);
        
        if ($responseData->error != null) {
            return view("student.manageProfile",['error'=>$responseData->error, 'update'=>1]);
        } else{
            session(['username' => $responseData->data['username']]);
           return view("student.manageProfile",['data'=>$responseData->data, 'update'=>1]);
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
                return view("student.manageProfile",['data'=>$data,'update'=>0,'status'=>'Mật khẫu không đúng']);
              }
               return view("student.manageProfile",['data'=>$data, 'status'=>'Thay đổi mật khẩu thành công']);
    }
}
?>