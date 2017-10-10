<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

/**
*  Route for home page
*/

Route::get('/', 'Home\IndexController@index')->name('home');
Route::get('/Login', 'Auth\LoginController@show')->name('Login');
Route::get('/Logout', 'Auth\LogoutController@logout')->name('Logout');
Route::get('/Register', 'Auth\RegisterController@show')->name('Register');
Route::post('/PerformLogin', 'Auth\LoginController@login');
Route::post('/PerformRegister', 'Auth\RegisterController@register');

/**
*  Route for admin page
*/
Route::group(['prefix'=> 'Admins'], function() {
    Route::get('/', 'Admin\IndexController@index')->name('Admins');
    Route::get('/Profile', 'Admin\ProfileController@showProfile');
    Route::get('/Student', 'Admin\ManageStudentController@showListOfStudent');
    Route::get('/Teacher', 'Admin\ManageTeacherController@showListOfTeacher');
    Route::get('/Question', 'Admin\ManageQuestionController@showListOfQuestion');
    Route::get('/UncheckedQuestion', 'Admin\ManageUncheckedQuestionController@showListOfUncheckedQuestion');
    Route::get('/Statistics', 'Admin\StatisticsController@showStatistics');
    // add route here
});


/**
*  Route for student page
*/
Route::group(['prefix'=> 'Students'], function() {
    Route::get('/', 'Student\IndexController@index')->name('Students');
    Route::get('/Profile', 'Student\ManageProfileController@showProfile');
    Route::get('/History', 'Student\ManageHistoryController@showHistory');
    Route::get('/TestTime/{quizzId}', 'Student\ManageHistoryController@showTestTime');
    Route::get('/Test', 'Student\ManageTestController@showTest');
    Route::get('/Quizz', 'Student\ManageQuizzController@showListOfQuizz');
    Route::get('/DoTest/{quizzId}', 'Student\DoTestController@doTest');
    Route::get('/GetQuizzScore', 'Student\DoTestController@getQuizzScore');
    Route::post('/Answer', 'Student\DoTestController@submitQuizz');
    Route::post('/Profile', 'Student\ManageProfileController@updateAccount');
    Route::post('/UpdatePassword', 'Student\ManageProfileController@updatePassword');
    Route::get('/Result', 'Student\SeeResultTestController@showResult');
     // add route here
});

/**
*  Route for teachermin page
*/
Route::group(['prefix'=> 'Teachers'], function() {
    Route::get('/', 'Teacher\IndexController@index')->name('Teachers');
    Route::get('/Profile', 'Teacher\ProfileController@showProfile');
    Route::get('/Question', 'Teacher\ManageQuestionController@showListOfQuestion');
    Route::post('/Question', 'Teacher\ManageQuestionController@addQuestion');
    Route::get('/GetSubject', 'Teacher\ManageQuestionController@getSubject');

     Route::get('/AddNewQuestion', 'Teacher\AddNewQuestionController@showAddNewQuestion');
     Route::get('/UpdateQuestion/{id}', 'Teacher\UpdateQuestionController@showUpdateQuestion');

    Route::post('/UpdateAccount', 'Teacher\ProfileController@updateAccount');
    Route::post('/UpdatePassword', 'Teacher\ProfileController@updatePassword');
    Route::get('/UncheckedQuestion', 'Teacher\ManageUncheckedQuestionController@showListOfUncheckedQuestion');
     // add route here
});


