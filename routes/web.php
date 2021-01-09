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

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
	// trang chủ
	Route::get('/', function () {
		if (Auth::User()->level == 1) {
			return redirect()->route('dashboard');
		} else {
			return redirect()->route('profile');
		}

	});
	Route::get('/profile', 'NhanVienController@getProfile')->name('profile');
	Route::post('/profile', 'NhanVienController@postProfile');
	Route::get('/bang-luong', 'NhanVienController@getBangLuong')->name('bangluong');
	Route::get('/bang-cong', 'NhanVienController@getBangCong');

	Route::get('/dashboard', 'HomeController@getView', ['middleware' => 'CheckAdmin'])->name('dashboard');
	// QL người dùng
	Route::group(['prefix' => 'user', 'middleware' => 'CheckAdmin'], function () {
		Route::get('/', ['as' => 'user', 'uses' => 'UserController@index']);
		Route::put('/addorupdate', ['as' => 'user.addorupdate', 'uses' => 'UserController@AddOrUpdate']);
		Route::get('/{id}/edit', 'UserController@edit');
		Route::DELETE('/{id}/delete', 'UserController@destroy');
		Route::get('import', ['as' => 'user.import', 'uses' => 'UserController@getImport']);
		Route::post('import', 'UserController@postImport');
	});

	// QL Lương
	Route::group(['prefix' => 'salary', 'middleware' => 'CheckAdmin'], function () {
		//Tiêu đề
		Route::group(['prefix' => 'col'], function () {
			Route::get('/', 'SalaryColController@getView')->name('salarycol');
			Route::PUT('/addorupdate', ['as' => 'salarycol.addorupdate', 'uses' => 'SalaryColController@AddOrUpdate']);
			Route::get('/{id}/edit', 'SalaryColController@edit');
			Route::DELETE('/{id}/delete', 'SalaryColController@destroy');
		});
		//nội dung
		Route::get('', 'SalaryController@getView')->name('salary');
		Route::get('add', 'SalaryController@getAdd')->name('salary.add');
		Route::post('add', 'SalaryController@postAdd');
		Route::get('import', 'SalaryController@getImport')->name('salary.import');
		Route::post('import', 'SalaryController@postImport');
		Route::get('edit/{id}', 'SalaryController@getEdit')->where(['id' => '[0-9]+'])->name('salary.edit');
		Route::post('edit/{id}', 'SalaryController@postEdit')->where(['id' => '[0-9]+']);
	});

	// QL Setting
	Route::group(['prefix' => 'settings', 'middleware' => 'CheckAdmin'], function () {
		Route::get('', 'SettingsController@getView');
		Route::post('', 'SettingsController@postView');
	});

	// help
	Route::get('help', 'HelpController@getView')->name('help');
	// gửi mail
	Route::group(['prefix' => 'send-mail', 'middleware' => 'CheckAdmin'], function () {
		Route::group(['prefix' => '/'], function () {
			Route::get('', 'SendEmailController@getHome');
		});
		Route::get('add', 'SendEmailController@getAdd');
		Route::post('add', 'SendEmailController@postAdd');
		Route::group(['prefix' => 'edit'], function () {
			Route::get('/{id}', 'SendEmailController@getEdit')->where(['id' => '[0-9]+']);
			Route::post('/{id}', 'SendEmailController@postEdit')->where(['id' => '[0-9]+']);
			Route::post('add/{id}', 'SendEmailController@postEditAdd')->where(['id' => '[0-9]+']);
		});

	});
});

// Authentication
Route::get('login', 'Auth\LoginController@viewLogin')->name('login');
Route::post('login', 'Auth\LoginController@CheckLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('forgotpassword', 'Auth\LoginController@getForgotPassword')->name('forgotPassword');
Route::post('forgotpassword', 'Auth\LoginController@postForgotPassword');
Route::get('resetpassword/{reset_password}', 'Auth\LoginController@resetPassword')->name('resetPassword');
Route::post('resetpassword', 'Auth\LoginController@PostresetPassword');
Route::post('changepassword', 'Auth\LoginController@ChangePassword')->name('changepassword');
Route::get('mail-success', 'Auth\LoginController@MailSuccess')->name('mailsuccess');




Route::get('/e3', function(){
	$file = "https://jthp.net/dowload/e3.zip" ;
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=JTEXPRESSVIETNAM-E3.zip");
	header("Content-Type: application/zip");
	header("Content-Transfer-Encoding: binary");
	readfile($file);
});
Route::get('/nvgn', function(){
	$file = "https://jthp.net/dowload/nvgn-1.0.67.apk" ;
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=APP-NVGN(v67).apk");
	header("Content-Type: application/vnd.android.package-archive");
	header("Content-Transfer-Encoding: binary");
	readfile($file);
});
Route::get('/nvgn2', function(){
	$file = "https://jthp.net/dowload/nvgn-1.0.62.apk" ;
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=APP-NVGN(v62).apk");
	header("Content-Type: application/vnd.android.package-archive");
	header("Content-Transfer-Encoding: binary");
	readfile($file);
});
Route::get('/jtcall', function(){
	$file = "https://jthp.net/dowload/app-jtCall-2.3.28.apk" ;
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=APP-J&T-CALL-2.3.58.apk");
	header("Content-Type: application/vnd.android.package-archive");
	header("Content-Transfer-Encoding: binary");
	readfile($file);
});
Route::get('/appvip', function(){
	$file = "https://jthp.net/dowload/app-kh-vip.apk" ;
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=APP-KH-VIP.apk");
	header("Content-Type: application/vnd.android.package-archive");
	header("Content-Transfer-Encoding: binary");
	readfile($file);
});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});