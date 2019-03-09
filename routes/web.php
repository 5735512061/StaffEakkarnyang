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
Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/staff-register','Admin\\AdminsController@staff_register')->name('home');	
		Route::post('/staff-register','Admin\\AdminsController@register');	
		Route::get('/header-register','Admin\\AdminsController@header_register');	
		Route::post('/header-register','Admin\\AdminsController@register_header');
		Route::get('/staff-bypass','Admin\\AdminsController@staff_bypass');
		Route::get('/staff-chaofa','Admin\\AdminsController@staff_chaofa');	
		Route::get('/staff-khokkloi','Admin\\AdminsController@staff_khokkloi');	
		Route::get('/staff-phangnga','Admin\\AdminsController@staff_phangnga');	
		Route::get('/staff-thaiwatsadu','Admin\\AdminsController@staff_thaiwatsadu');	
		Route::get('/staff-thalang','Admin\\AdminsController@staff_thalang');	
		Route::get('/staff-information/{id}','Admin\\AdminsController@staff_information');
		Route::get('/edit-staff/{id}', 'Admin\AdminsController@edit_staff');
		Route::post('/update-staff','Admin\AdminsController@update_staff');	
		Route::post('/delete-staff/{id}','Admin\AdminsController@delete_staff');
	});
});

Route::group(['prefix' => 'header'], function(){
	Route::get('/login','AuthHeader\LoginController@ShowLoginForm')->name('header.login');
    Route::post('/login','AuthHeader\LoginController@login')->name('header.login.submit'); 
    Route::post('/logout', 'AuthStaff\LoginController@logout')->name('header.logout'); 
    Route::get('/staff-register','Header\\HeadersController@staff_register')->name('header.home');
	Route::post('/staff-register','Header\\HeadersController@register');	
	Route::get('/staff-bypass','Header\\HeadersController@staff_bypass');	
	Route::get('/staff-chaofa','Header\\HeadersController@staff_chaofa');	
	Route::get('/staff-khokkloi','Header\\HeadersController@staff_khokkloi');	
	Route::get('/staff-phangnga','Header\\HeadersController@staff_phangnga');	
	Route::get('/staff-thaiwatsadu','Header\\HeadersController@staff_thaiwatsadu');	
	Route::get('/staff-thalang','Header\\HeadersController@staff_thalang');	
	Route::get('/staff-information/{id}','Header\\HeadersController@staff_information');
	Route::get('/edit-staff/{id}', 'Header\HeadersController@edit_staff');
	Route::post('/update-staff','Header\HeadersController@update_staff');
	Route::get('/delete-staff/{id}','Header\HeadersController@delete_staff');
	Route::get('/history-bypass','Header\\HeadersController@history_bypass');
	Route::get('/history-chaofa','Header\\HeadersController@history_chaofa');	
	Route::get('/history-khokkloi','Header\\HeadersController@history_khokkloi');	
	Route::get('/history-phangnga','Header\\HeadersController@history_phangnga');	
	Route::get('/history-thaiwatsadu','Header\\HeadersController@history_thaiwatsadu');	
	Route::get('/history-thalang','Header\\HeadersController@history_thalang');
	Route::get('/history-information/{id}','Header\\HeadersController@history_information');		
}); 

Route::group(['prefix' => 'staff'], function(){
	Route::get('/login','AuthStaff\LoginController@ShowLoginForm')->name('staff.login');
    Route::post('/login','AuthStaff\LoginController@login')->name('staff.login.submit');  
    Route::post('/logout', 'AuthStaff\LoginController@logout')->name('staff.logout');
	Route::get('/profile','Staff\\StaffsController@profile')->name('staff.home');
});
