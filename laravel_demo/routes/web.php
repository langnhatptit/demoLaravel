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
Route::get('/', function () {
	return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'user'],function(){

	Route::get('listUser',['as' => 'getListUser' , 'uses'=>'UserController@getListUser']);
	Route::get('addUser',['as' => 'getAddUser' , 'uses'=>'UserController@getAddUser']);
	Route::post('addUser',['as' => 'postAddUser' , 'uses'=>'UserController@postAddUser']);
	Route::post('editUser',['as' => 'postEditUser' , 'uses'=>'UserController@postEditUser']);
	Route::get('deleteUser/{id}',['as' => 'getDeleteUser' , 'uses'=>'UserController@getDeleteUser'])-> where('id','[0-9]+');
	Route::get('editUser/{id}',['as' => 'getEditUser' , 'uses'=>'UserController@getEditUser'])-> where('id','[0-9]+');;
	Route::post('editUser/{id}',['as' => 'postEditUser' , 'uses'=>'UserController@postEditUser'])-> where('id','[0-9]+');;
});