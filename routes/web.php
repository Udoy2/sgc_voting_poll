<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Auth\LoginController@showPerticipantLoginForm');

/////////routes auth/////////////////////
// Authentication Routes...
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');


Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/perticipant', 'Auth\LoginController@perticipantLogin')->name('login.post.perticipant');


Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);



/////////routes auth end ////////////////

Route::get('/perticipant_department/{department}', 'perticipant\departmentManager@store_department')
                                                        ->middleware(['auth:perticipant'])
                                                        ->name('perticipant.perticipant_department');
Route::group(['prefix'=>'perticipant','middleware' => ['auth:perticipant','loginPermission','PerticipantDepartment'],'namespace'=>'perticipant'], function () {
  
  Route::get('/home', 'PerticipantController@index')->name('perticipant.dashboard');
  Route::post('/home/vote_submit','PerticipantController@vote_submit')->name('vote_form_submit');
});


Route::group(['prefix'=>'workshop','middleware' => ['auth:admin'],'namespace'=>'admin'], function () {
  Route::get('/poll', 'AdminController@poll_index')->name('admin.poll');
  Route::post('/poll/add_poll','AdminController@add_poll')->name('admin.poll.add_poll');
  Route::post('/poll/delete_poll','AdminController@poll_delete')->name('admin.poll.delete_poll');
  Route::post('/poll/publish_poll','AdminController@publish_poll')->name('admin.poll.publish_poll');
  Route::post('/poll/perticipant_login_permission','AdminController@perticipant_login_permission')->name('admin.poll.perticipant_login_permission');
  Route::get('/download/{id}/{name}','AdminController@perticipant_export')->name('admin.poll.excel_download');


  Route::get('/teacher','AdminController@teacher_index')->name('admin.teacher');
  Route::post('/teacher/add_teacher','AdminController@add_teacher')->name('admin.teacher.add_teacher');
  Route::post('/teacher/edit_teacher','AdminController@edit_teacher')->name('admin.teacher.edit_teacher');
  Route::post('/teacher/delete_teacher','AdminController@delete_teacher')->name('admin.teacher.delete_teacher');

  Route::get('/result','AdminController@result_index')->name('admin.result');
  Route::get('/result/poll/{id}','AdminController@poll_result')->name('admin.result.poll');
  

});




