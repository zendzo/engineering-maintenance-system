<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Administrator Sections
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'administrator'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Admin\AdministratorController@index'
	]);

	Route::resource('role', 'Admin\RoleController');

	Route::resource('user', 'UserController');

	Route::get('/application-menus',[
		'as'	=>	'app.menu',
		'uses'	=>	'Admin\MenuController@index'
	]);

	Route::resource('workorder', 'WorkOrderController');

	// Report Section
	Route::get('report/{type}', [
		'as' => 'report.type',
		'uses' => 'ReportController@showReportType'
	]);

	// Settings Section
	Route::get('setting/{type}', [
		'as'	=> 'setting.type',
		'uses'	=> 'SettingController@showSettingType'
	]);

	// maintenance calendar and assets
	Route::resource('calendar', 'CalendarController');

	Route::resource('maintenance_task', 'MaintenanceTaskController');

	Route::resource('asset', 'AssetController');
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
