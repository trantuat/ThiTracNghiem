<?php
    namespace App\Service;

    interface QuizzServiceInterface {
       
        public function login($username, $password);

        public function resetPassword($email);

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

        public function checkQuestion($questionId);

        public function blockUser($userId);

        public function getUserByUserId($userId);

        public function updateAnswer($parameters);

        public function getNumberQuestionPublicByTeacher();

        public function getNumberQuestionNonPublicByTeacher();

        public function top10Score();

        public function getNumberTeacher();

        public function getNumberStudent();

        public function getNumberQuizz();

        public function getNumberQuestion();

        public function deleteQuestion($questionId);

        public function getClassBySubjectId($topicId);

        public function getAllTopic();

        public function getQuizzTemplate();

        public function createQuizzTemplate($parameters);

        public function deleteQuizzTemplate($quizzTemplateId);

        public function deleteHistory($historyId);

        public function getQuizzTemplateById($quizzTemplateId);

        public function updateQuizzTemplate($parameters);
    }
?>