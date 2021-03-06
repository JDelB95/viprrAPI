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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Make an API route.
//@availableCourses is the method name that will be in the availableCoursesController
Route::get('availableCourses/{term}', 'Courses\availableCoursesController@show');
//Route::get('availableCourses2/{term}, {courses}', 'Courses\availableCoursesController@availableCourses2');
Route::post('availableCourses2', 'Courses\availableCoursesController@availableCourses2');
Route::get('transcript', 'Student\transcriptController@transcript');
Route::get('studentTranscript', 'Student\transcriptController@studentTranscript');
Route::get('transcript/{id}', 'Student\transcriptController@show');
Route::get('studentProfile/{id}', 'Student\studentProfileController@studentProfile');
Route::get('getCurriculum/{Maj_Code}', 'Student\curriculumController@getCurriculum');
Route::get('getStudentCurriculum/{id}', 'Student\curriculumController@getStudentCurriculum');
Route::get('progress/{id}', 'Student\curriculumController@progress');
Route::get('getProgress/{id}', 'Student\curriculumController@getProgress');
Route::post('insertSchedule/', 'Student\finalScheduleController@insertSchedule');
Route::post('insertTranscript/', 'Student\transcriptController@insertTranscript');
Route::post('addCurriculum/', 'Student\curriculumController@addCurriculum');
Route::put('updateCurriculum/{id}', 'Student\curriculumController@updateCurriculum');
Route::delete('destroy/{id}', 'Student\curriculumController@destroy');
Route::get('getSchedule/{id}', 'Student\finalScheduleController@getSchedule');