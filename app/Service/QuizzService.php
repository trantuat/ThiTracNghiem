<?php
    namespace App\Service;
    use App\Service\Api\ApiHelper;

    class QuizzService implements QuizzServiceInterface
    {
        static private $quizzService = NULL;
        
        private function __construct(){
        }

        static function getInstance()
        {
            if (self::$quizzService == NULL) {
                self::$quizzService = new QuizzService();
            }
            return self::$quizzService;
        }
        
        public function login($username, $password) {
           $parameters =  ['email'=>$username,'password'=> $password];
           return ApiHelper::getInstance()->post('api/user/login',$parameters);
        }

        public function getInfor() {
            return ApiHelper::getInstance()->get('api/user');
        }

        public function updateAccount($parameters) {
            return ApiHelper::getInstance()->put('api/user/update', $parameters);
        }
        
        public function updatePassword($parameters) {
            return ApiHelper::getInstance()->put('api/user/password', $parameters);
        }
        public function getHistory(){
            return ApiHelper::getInstance()->get('api/quizz/getHistory');
        }
        public function getListOfQuestion(){
            return ApiHelper::getInstance()->get('api/user/question');
        }
        // public function add($username, $password) {
        //     $parameters =  ['email'=>$username,'password'=> $password];
        //     return ApiHelper::getInstance()->post('api/user/login',$parameters,"application/json");
        //  }
         public function register($parameters){
            return ApiHelper::getInstance()->post('api/user/register', $parameters); 
         }

         public function logout() {
            return ApiHelper::getInstance()->delete('api/user/logout',null); 
         }

         public function getSubject($classId){
            return ApiHelper::getInstance()->get('api/question/topic/class_id='.$classId); 
         }
         public function addQuestion($parameters){
            return ApiHelper::getInstance()->post('api/question/add',$parameters,'application/json'); 
         }
         public function doTest($quizzId){
            return ApiHelper::getInstance()->get('api/quizz/start/'.$quizzId);
         }

         public function getAllQuizz(){
            return ApiHelper::getInstance()->get('api/quizz/all');
         }
         public function submitQuizz($parameters){
            return ApiHelper::getInstance()->post('api/quizz/answer',$parameters,'application/json');
         }
         public function getQuizzScore($quizzId){
            return ApiHelper::getInstance()->get('api/quizz/getQuizzScore/'.$quizzId);
         }
         public function getTestTime($quizzId){
            return ApiHelper::getInstance()->get('api/quizz/getHistoryDetail/quizzId='.$quizzId);
         }
         
    }

?>