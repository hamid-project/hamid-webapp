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
})->name('top');

Auth::routes(['register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('myaccount')->name('myaccount.')->group(function() {
    Route::get('password', 'MyAccount\MyAccountController@password_edit')->name('password.edit');
    Route::put('password', 'MyAccount\MyAccountController@password_update')->name('password.update');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function() {
    Route::get('', 'Admin\TopController@dashboard')->name('dashboard');

    Route::resource('supervisors', 'Admin\SupervisorController');
    Route::resource('students', 'Admin\StudentController');
    Route::resource('companies', 'Admin\CompanyController');
    Route::resource('companyStaff', 'Admin\CompanyStaffController');
    Route::resource('internships', 'Admin\InternshipController');
    Route::resource('internshipApplications', 'Admin\InternshipApplicationController');
    Route::resource('communicationGiftHistories', 'Admin\CommunicationGiftHistoryController');
    Route::resource('communicationContactHistories', 'Admin\CommunicationContactHistoryController');

    Route::get('files/{file}/download', 'Admin\FileController@download')->name('files.download');
});

Route::prefix('student')->name('student.')->group(function() {
    Route::resource('students', 'Student\StudentController')->only(['create', 'store']);
    Route::get('students/completed', 'Student\StudentController@completed')->name('students.completed');
});
