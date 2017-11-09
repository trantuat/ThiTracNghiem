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

        public function resetPassword($email) {
            $parameters =  ['email'=>$email];
            return ApiHelper::getInstance()->post('api/admin/forgotPassword',$parameters);
        }

        public function getInfor() {
            return ApiHelper::getInstance()->get('api/user');
        }

        public function updateAccount($parameters) {
            return ApiHelper::getInstance()->put('api/user/update', $parameters);
        }
        
        public function updatePassword($parameters) {
            return ApiHelper::getInstance()->post('api/user/password', $parameters);
        }
        public function getHistory(){
            return ApiHelper::getInstance()->get('api/quizz/getHistory');
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

        public function getResultTest($historyId){
            return ApiHelper::getInstance()->get('api/quizz/getResultTest/historyID='.$historyId);
        }

        public function createQuizz($parameters){
            return ApiHelper::getInstance()->post('api/quizz/create',$parameters);
        }

        public function getAllLevel(){
            return ApiHelper::getInstance()->get('api/question/level');
        }

        public function getAllClass(){
            return ApiHelper::getInstance()->get('api/question/class');
        }
        
        public function showDetailQuestion($questionId){
            return ApiHelper::getInstance()->get('api/question/question='.$questionId);
        }

        public function updateQuestion($parameters){
            return ApiHelper::getInstance()->put('api/question/update',$parameters,'application/json');
        }

        public function getQuestionPublicByTeacher(){
            return ApiHelper::getInstance()->get('api/user/getQuestionPublic');
        }

        public function getQuestionNonPublicByTeacher(){
            return ApiHelper::getInstance()->get('api/user/getQuestionNonPublic');
        }
        
        public function getListOfUser($role){
            return ApiHelper::getInstance()->get('api/admin/userByRole/'.$role);
        }

        public function getAllQuestionPublicByAdmin(){
            return ApiHelper::getInstance()->get('api/admin/public');
        }
        
        public function getAllQuestionNonPublicByAdmin(){
            return ApiHelper::getInstance()->get('api/admin/nonPublic');
        }
        public function checkQuestion($questionId){
            return ApiHelper::getInstance()->put('api/admin/verify/questionId='.$questionId);
        }

        public function blockUser($userId){
            return ApiHelper::getInstance()->put('api/admin/blockUser/userId='.$userId);
        }

        public function getUserByUserId($userId){
            return ApiHelper::getInstance()->get('api/admin/getUserByUserID/userID='.$userId);
        }

        public function updateAnswer($parameters){
            return ApiHelper::getInstance()->put('api/user/updateAnswer',$parameters,'application/json');
        }

        public function getNumberQuestionPublicByTeacher(){
            return ApiHelper::getInstance()->get('api/user/numberQuestionPublic');
        }

        public function getNumberQuestionNonPublicByTeacher(){
            return ApiHelper::getInstance()->get('api/user/numberQuestionNonPublic');
        }

        public function top10score(){
            return ApiHelper::getInstance()->get('api/admin/top10Score');
        }

        public function getNumberTeacher(){
            return ApiHelper::getInstance()->get('api/admin/numberTeacher');
        }

        public function getNumberStudent(){
            return ApiHelper::getInstance()->get('api/admin/numberStudent');
        }

        public function getNumberQuizz(){
            return ApiHelper::getInstance()->get('api/admin/numberQuizz');
        }

        public function getNumberQuestion(){
            return ApiHelper::getInstance()->get('api/admin/numberQuestion');
        }

        public function deleteQuestion($questionId){
            return ApiHelper::getInstance()->delete('api/admin/deleteQuestion/questionID='.$questionId);
        }

        public function getClassBySubjectId($topicId){
            return ApiHelper::getInstance()->get('api/user/getClassByTopicId/topicID='.$topicId);
        }
        
        public function getAllTopic(){
            return ApiHelper::getInstance()->get('api/user/getAllTopic');
        }


    }

?>