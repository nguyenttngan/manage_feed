<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', 'API\UserController@logout');
    Route::get('/get-current-user','API\UserController@getCurrentUser');
    Route::get('/get-semesters','API\CourseController@getSemesters');
    Route::post('/create-course','API\CourseController@store');
    Route::get('/get-courses-student/{student_id}','API\CourseController@getCoursesByStudentID');
    Route::get('/get-courses-lecturer/{lecturer_id}','API\CourseController@getCoursesByLecturerID');
    Route::get('/courses/{id}','API\CourseController@show');
    Route::get('/get-students/{user_id}','API\UserController@getStudentByUserID');
    Route::get('/get-lecturers/{user_id}','API\UserController@getLecturerByUserID');
    Route::get('/get-sections/{course_id}','API\SectionController@getSectionByCourseID');
    Route::post('/sections','API\SectionController@store');
    Route::get('/get-posts/{section_id}','API\PostController@getPostBySectionID');
    Route::post('/posts','API\PostController@store');
    Route::get('/posts/{id}','API\PostController@show');
    Route::post('/comments','API\CommentController@store');
    Route::get('/comments/{post_id}','API\CommentController@getCommentByPost');
    Route::get('/courses/search/{keyword}', 'API\CourseController@search');
});
Route::post('/upload-image','API\PostController@uploadImage');
