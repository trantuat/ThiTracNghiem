<?php
    namespace App\Service;

    interface QuizzServiceInterface {
       
        public function login($username, $password);

        public function getInfor();

        public function updateAccount($parameters);

        public function updatePassword($parameters);

        public function getHistory();

        public function getListOfQuestion();

        public function register($parameters);
        
        public function logout();

        public function getSubject($classId);

        public function addQuestion($parameters);

        public function doTest($quizzId);

        public function getAllQuizz();

        public function submitQuizz($parameters);

        public function getQuizzScore($quizzId);

        public function getTestTime($quizzId);
    }
?>