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
//error
Route::get('error', function () {
    return view('errors.401');
})
->name('error.get');

//department
Route::get('/',function(){
    return redirect()->route('department.get');
})
->middleware('isLogin');
Route::get('/department','App\Http\Controllers\DepartmentController@index')
->middleware('isLogin')
->name('department.get'); //get
Route::post('/add-department','App\Http\Controllers\DepartmentController@inserts')
->middleware('isLogin','adminMiddle')
->name('department.post'); //post
Route::get('delete-department/{id}','App\Http\Controllers\DepartmentController@deletes')
->middleware('isLogin','adminMiddle')
->name('department.delete'); //delete
Route::get('edit-department/{id}','App\Http\Controllers\DepartmentController@edits')
->middleware('isLogin','adminMiddle')
->name('department.edit'); //get edit
Route::post('update-department','App\Http\Controllers\DepartmentController@updates')
->middleware('isLogin','adminMiddle')
->name('department.update');
Route::get('search-department','App\Http\Controllers\DepartmentController@search')
->middleware('isLogin','adminMiddle')
->name('department.search');

//login
Route::get('/login','App\Http\Controllers\AuthController@login')
->middleware('inLogin')
->name('login.get');
Route::post('signin','App\Http\Controllers\AuthController@signin')
->middleware('inLogin')
->name('signin');
//register
Route::get('register','App\Http\Controllers\AuthController@register')
->middleware('inLogin','registerMiddle')
->name('register.get');
Route::post('/registered','App\Http\Controllers\AuthController@signup')
->middleware('registerMiddle')
->name('register.post');

//reset-password
Route::get('forgot','App\Http\Controllers\ResetPasswordController@forgot')
->middleware('inLogin')
->name('forgot.get');
Route::post('sendMail','App\Http\Controllers\ResetPasswordController@sendMail')
->middleware('mailMiddle')
->name('sendmail');
Route::post('reset-password','App\Http\Controllers\ResetPasswordController@resetPassword')
->middleware('isConfigPassword')
->name('reset.password.post');
Route::get('reset-password/{token}','App\Http\Controllers\ResetPasswordController@showResetPasswordForm')
->middleware('inLogin')
->name('reset.password.get');

//logout
Route::get('logout', 'App\Http\Controllers\AuthController@logOut')
->name('logout');

//user
Route::get('/user','App\Http\Controllers\UserController@index')
->middleware('isLogin')
->name('user.get');
Route::get('search-user','App\Http\Controllers\UserController@search')
->middleware('isLogin')
->name('user.search');

//meetroom
Route::get('/meetroom', 'App\Http\Controllers\MeetRoomController@index')
->middleware('isLogin')
->name('meetroom.get');
Route::post('/add-meet-room', 'App\Http\Controllers\MeetRoomController@inserts')
->middleware('isLogin','adminMiddle')
->name('meetroom.post');
Route::get('delete-meetroom/{id}','App\Http\Controllers\MeetRoomController@deletes')
->middleware('isLogin','adminMiddle')
->name('meetroom.delete');
Route::get('edit-meetroom/{id}','App\Http\Controllers\MeetRoomController@edits')
->middleware('isLogin','adminMiddle')
->name('meetroom.edit');
Route::post('update-meetroom','App\Http\Controllers\MeetRoomController@updates')
->middleware('isLogin','adminMiddle')
->name('meetroom.update');
Route::get('search-meetRoom','App\Http\Controllers\MeetRoomController@search')
->middleware('isLogin','adminMiddle')
->name('meetroom.search');

//bookroom
Route::get('book-room', 'App\Http\Controllers\BookroomController@index')
->middleware('isLogin')
->name('book-room');
Route::get('book-room-date/{id}', 'App\Http\Controllers\BookroomController@viewBook')
->middleware('isLogin')
->name('book.room.date');
Route::post('book-room-post','App\Http\Controllers\BookroomController@bookRoom')
->middleware('isLogin')
->name('book.room.post');
Route::post('book-room-date-post','App\Http\Controllers\BookroomController@book')
->middleware('isLogin','BookdateMiddle')
->name('book.post');

Route::get('manager-book-room', 'App\Http\Controllers\BookroomController@viewManager')
->middleware('isLogin')
->name('manager.book.room');
Route::get('delete-manager-book-room/{id}', 'App\Http\Controllers\BookroomController@deletes')
->middleware('isLogin')
->name('manager.book.room.cancel');
Route::get('search-ticket','App\Http\Controllers\BookroomController@search')
->middleware('isLogin')
->name('ticket.search');
//join user
Route::get('join-user/{id}','App\Http\Controllers\JoinUserController@viewJoin')
->middleware('isLogin')
->name('join.user.get');
Route::post('add-user','App\Http\Controllers\JoinUserController@joinUser')
->middleware('isLogin')
->name('join.user.post');
Route::get('is-join-user/{id}','App\Http\Controllers\JoinUserController@viewNumberJoin')
->middleware('isLogin')
->name('is.join.user');
Route::get('delete-join-user/{id}','App\Http\Controllers\JoinUserController@deleteUserJoin')
->middleware('isLogin')
->name('delete.join.user');

//profile
Route::get('profile','App\Http\Controllers\ProfileController@isProfile')
->middleware('isLogin')
->name('profile.get');
Route::post('update-profile','App\Http\Controllers\ProfileController@updateProfile')
->middleware('isLogin')
->name('profile.post');
Route::post('change-password','App\Http\Controllers\ProfileController@changePassword')
->middleware('isLogin','ConfigchangeMiddle')
->name('change.pass.post');
