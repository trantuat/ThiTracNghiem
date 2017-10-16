<?php
    namespace App\Service;

    interface QuizzServiceInterface {
       
        public function login($username, $password);

        public function getInfor();

        public function updateAccount($parameters);

        public function updatePassword($parameters);

        public function getHistory();

        public function register($parameters);
        
        public function logout();

        public function getSubject($classId);

        public function getAllLevel();

        public function getAllClass();

        public function addQuestion($parameters);

        public function doTest($quizzId);

        public function getAllQuizz();

        public function submitQuizz($parameters);

        public function getQuizzScore($quizzId);

        public function getTestTime($quizzId);

        public function getResultTest($historyId);

        public function createQuizz($parameters);

        public function showDetailQuestion($questionId);

        public function updateQuestion($parameters);

        public function getQuestionPublicByTeacher();

        public function getQuestionNonPublicByTeacher();

        public function getListOfUser($role);

        public function getAllQuestionPublicByAdmin();

        public function getAllQuestionNonPublicByAdmin();
    }
?>