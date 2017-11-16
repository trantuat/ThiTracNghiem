<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\QuizzService;

class ManageStudentController extends Controller
{
    public function showListOfStudent() {
        $responseData = QuizzService::getInstance()->getListOfUser("1");
        // var_dump($responseData->data);
        return view('admin.manageStudent',['data'=>$responseData->data]);
    }

    public function blockUser(Request $request){
        $userId=$request->userId;
        $responseData = QuizzService::getInstance()->blockUser($userId);
        
        return json_encode($responseData->data);
    }

    public function showProfileUser(Request $request){
        $userId=$request->userId;
        $responseData = QuizzService::getInstance()->getUserByUserId($userId);
        // var_dump($responseData->data);
        if ($responseData->error != null) {
            return json_encode($responseData->error);
        }
        return json_encode($responseData->data);
    }

    public function getBlockHistoryByUserId(Request $request){
        $userId=$request->userId;
        $responseData = QuizzService::getInstance()->getBlockHistoryByUserId($userId);
        
        if ($responseData->error != null) {
            return json_encode($responseData->error);
        }
        
        $data=$responseData->data;
        $i=1;
        $html="";
        if($data){
            foreach($data as $row){
                $html.="<tr>";
                $html.="<td>".$i++."</td><td>".$row['block_date']."</td><td>".$row['unblock_date']."</td></tr>";
            }
		} else{
        }
        return json_encode($html);
    }


}
