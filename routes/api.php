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
    Route::get('/get-semesters','API\CourseController@getSemesters');
    Route::post('/create-course','API\CourseController@store');
    Route::get('/courses/{student_id}','API\CourseController@getCoursesByStudent');
    Route::get('/get-students/{user_id}','API\UserController@getStudentID');
    Route::get('/get-sections/{course_id}','API\SectionController@getSectionByCourseID');
    Route::get('/get-posts/{section_id}','API\PostController@getPostBySectionID');
    Route::post('/posts','API\PostController@store');
    Route::get('/posts/{id}','API\PostController@show');
    Route::post('/comments','API\CommentController@store');
    Route::get('/comments/{post_id}','API\CommentController@getCommentByPost');
});
