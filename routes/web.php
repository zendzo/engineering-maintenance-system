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

	Route::resource('location', 'LocationController');

	Route::resource('category', 'CategoryController');

	Route::resource('supplier', 'SupplierController');

	Route::resource('department', 'DepartmentController');

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

Route::get('/home/job-done','HomeController@jobDone')->name('job-done');

Route::post('workorder', 'WorkOrderController@store')
			->middleware('auth')
			->name('workorder.store');
Route::put('workorder/{id}', 'WorkOrderController@updateStatus')
			->middleware('auth')
			->name('workorder.status.update');
