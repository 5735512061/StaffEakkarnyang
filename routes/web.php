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
		Route::get('/staff-salary','Admin\\AdminsController@staff_salary');
		Route::get('/staff-fund','Admin\\AdminsController@staff_fund');
		Route::post('/staff-fund','Admin\AdminsController@fund');	
		Route::get('/fund-information/{id}','Admin\\AdminsController@fund_information');
		Route::get('/staff-bonus','Admin\\AdminsController@staff_bonus');
		Route::get('/edit-staff/{id}', 'Admin\\AdminsController@edit_staff');
		Route::post('/update-staff','Admin\\AdminsController@update_staff');	
		Route::post('/delete-staff/{id}','Admin\\AdminsController@delete_staff');
		Route::get('/history-bypass','Admin\\AdminsController@history_bypass');
		Route::get('/history-chaofa','Admin\\AdminsController@history_chaofa');	
		Route::get('/history-khokkloi','Admin\\AdminsController@history_khokkloi');	
		Route::get('/history-phangnga','Admin\\AdminsController@history_phangnga');	
		Route::get('/history-thaiwatsadu','Admin\\AdminsController@history_thaiwatsadu');	
		Route::get('/history-thalang','Admin\\AdminsController@history_thalang');
		Route::get('/history-information/{id}','Admin\\AdminsController@history_information');
		Route::get('/work-bypass','Admin\\AdminsController@work_bypass');
		Route::get('/work-chaofa','Admin\\AdminsController@work_chaofa');	
		Route::get('/work-khokkloi','Admin\\AdminsController@work_khokkloi');	
		Route::get('/work-phangnga','Admin\\AdminsController@work_phangnga');	
		Route::get('/work-thaiwatsadu','Admin\\AdminsController@work_thaiwatsadu');	
		Route::get('/work-thalang','Admin\\AdminsController@work_thalang');	
		Route::get('/work-information/{id}','Admin\\AdminsController@work_information');
		Route::get('/edit-work/{id}', 'Admin\\AdminsController@edit_work');
		Route::post('/update-work','Admin\\AdminsController@update_work');	
		Route::post('/work-absence','Admin\\AdminsController@absence');	
		Route::post('/search','Admin\\AdminsController@search');
	});
});

// Route::group(['middleware' => ['auth:header']], function () {
	Route::group(['prefix' => 'header'], function(){
		Route::get('/login','AuthHeader\LoginController@ShowLoginForm')->name('header.login');
	    Route::post('/login','AuthHeader\LoginController@login')->name('header.login.submit'); 
	    Route::post('/logout', 'AuthHeader\LoginController@logout')->name('header.logout'); 
	    Route::get('/staff-register','Header\\HeadersController@staff_register')->name('header.home');
		Route::post('/staff-register','Header\\HeadersController@register');	
		Route::get('/staff-bypass','Header\\HeadersController@staff_bypass');	
		Route::get('/staff-chaofa','Header\\HeadersController@staff_chaofa');	
		Route::get('/staff-khokkloi','Header\\HeadersController@staff_khokkloi');	
		Route::get('/staff-phangnga','Header\\HeadersController@staff_phangnga');	
		Route::get('/staff-thaiwatsadu','Header\\HeadersController@staff_thaiwatsadu');	
		Route::get('/staff-thalang','Header\\HeadersController@staff_thalang');	
		Route::get('/staff-information/{id}','Header\\HeadersController@staff_information');
		Route::get('/staff-fund','Header\\HeadersController@staff_fund');
		Route::post('/staff-fund','Header\\HeadersController@fund');	
		Route::get('/fund-information/{id}','Header\\HeadersController@fund_information');
		Route::get('/staff-bonus','Header\\HeadersController@staff_bonus');
		Route::get('/staff-salary','Header\\HeadersController@staff_salary');
		Route::get('/edit-staff/{id}', 'Header\\HeadersController@edit_staff');
		Route::post('/update-staff','Header\\HeadersController@update_staff');
		Route::post('/delete-staff/{id}','Header\\HeadersController@delete_staff');
		Route::get('/history-bypass','Header\\HeadersController@history_bypass');
		Route::get('/history-chaofa','Header\\HeadersController@history_chaofa');	
		Route::get('/history-khokkloi','Header\\HeadersController@history_khokkloi');	
		Route::get('/history-phangnga','Header\\HeadersController@history_phangnga');	
		Route::get('/history-thaiwatsadu','Header\\HeadersController@history_thaiwatsadu');	
		Route::get('/history-thalang','Header\\HeadersController@history_thalang');
		Route::get('/history-information/{id}','Header\\HeadersController@history_information');
		Route::get('/work-bypass','Header\\HeadersController@work_bypass');
		Route::get('/work-chaofa','Header\\HeadersController@work_chaofa');	
		Route::get('/work-khokkloi','Header\\HeadersController@work_khokkloi');	
		Route::get('/work-phangnga','Header\\HeadersController@work_phangnga');	
		Route::get('/work-thaiwatsadu','Header\\HeadersController@work_thaiwatsadu');	
		Route::get('/work-thalang','Header\\HeadersController@work_thalang');	
		Route::get('/work-information/{id}','Header\\HeadersController@work_information');
		Route::get('/edit-work/{id}', 'Header\\HeadersController@edit_work');
		Route::post('/update-work','Header\\HeadersController@update_work');
		Route::post('/work-absence','Header\\HeadersController@absence');	
		Route::post('/search','Header\\HeadersController@search');	
	}); 
// });

// Route::group(['middleware' => ['auth:staff']], function () {
	Route::group(['prefix' => 'staff'], function(){
		Route::get('/login','AuthStaff\LoginController@ShowLoginForm')->name('staff.login');
	    Route::post('/login','AuthStaff\LoginController@login')->name('staff.login.submit');  
	    Route::post('/logout', 'AuthStaff\LoginController@logout')->name('staff.logout');
		Route::get('/profile','Staff\\StaffsController@profile')->name('staff.home');
		Route::get('/work-information','Staff\\StaffsController@work_information');
		Route::get('/fund','Staff\\StaffsController@fund');
		Route::get('/bonus','Staff\\StaffsController@staff_bonus');
	});
// });

