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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//user 
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'UserController@details');
});

//course
$this->group(['prefix' => 'course'], function() {
    $this->post('/', 'CourseController@store');
    $this->post('/update/{course_id}','CourseController@update');
    $this->get('/index','CourseController@index');
});
//student
$this->group(['prefix' => 'student'], function() {
    $this->post('/', 'StudentController@store');
    $this->post('/update/{student_id}','StudentController@update');
    $this->get('/index','StudentController@index');
    $this->get('/index/{student_id}','StudentController@view');
    $this->delete('/delete/{student_id}','StudentController@destroy');

});


