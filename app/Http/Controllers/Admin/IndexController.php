<?php
    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Requests;
    use App\Service\QuizzService; 
    
    class IndexController extends Controller
    {
        public function index() 
        {       
          return view("admin.index");
        }
    }
?>