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

//department
Route::get('/',function(){
    return redirect()->route('department.get');
})
->middleware('isLogin')
->name('department.get');
Route::get('/department','App\Http\Controllers\DepartmentController@index')
->middleware('isLogin')
->name('department.get');
Route::post('/department','App\Http\Controllers\DepartmentController@inserts')
->middleware('isLogin')
->name('department.post');
Route::get('delete-department/{id}','App\Http\Controllers\DepartmentController@deletes')
->middleware('isLogin')
->name('delete.department');
Route::get('edit-department/{id}','App\Http\Controllers\DepartmentController@edits')
->middleware('isLogin')
->name('edit.department');

//auth-get
Route::get('/login','App\Http\Controllers\AuthController@login')
->name('login.get');
Route::get('register','App\Http\Controllers\AuthController@register')
->name('register.get');
Route::get('forgot','App\Http\Controllers\ResetPasswordController@forgot')
->name('forgot.get');
Route::get('logout', 'App\Http\Controllers\AuthController@logOut')
->name('logout');
Route::get('reset-password/{token}','App\Http\Controllers\ResetPasswordController@showResetPasswordForm')
->name('reset.password.get');

//auth-post
Route::post('/registered','App\Http\Controllers\AuthController@signup')
->middleware('registerMiddle')
->name('register.post');
Route::post('signin','App\Http\Controllers\AuthController@signin')
->name('signin');
Route::post('sendMail','App\Http\Controllers\ResetPasswordController@sendMail')
->middleware('mailMiddle')
->name('sendmail');
Route::post('reset-password','App\Http\Controllers\ResetPasswordController@resetPassword')
->name('reset.password.post');

//user
Route::get('/user','App\Http\Controllers\UserController@index')
->middleware('isLogin')
->name('user.get');

//meetroom
Route::get('/meetroom', 'App\Http\Controllers\MeetRoomController@index')
->middleware('isLogin')
->name('meetroom.get');
Route::post('/insert-meet-room', 'App\Http\Controllers\MeetRoomController@inserts')
->middleware('isLogin')
->name('meetroom.post');
Route::get('delete-meetroom/{id}','App\Http\Controllers\MeetRoomController@deletes')
->middleware('isLogin')
->name('delete.meetroom');

//bookroom
Route::get('book-room', 'App\Http\Controllers\BookroomController@index')
->middleware('isLogin')
->name('book-room');
