<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pass', [App\Http\Controllers\DepartmentController::class, 'password']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'loginPage'])->name('login-page');
Route::post('/login-post', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login-post');


Route::get('/departments', [App\Http\Controllers\DepartmentController::class, 'getDepartments']);
Route::post('/department/store', [App\Http\Controllers\DepartmentController::class, 'addDepartment'])->name('department.store');
Route::post('/department/update_status', [App\Http\Controllers\DepartmentController::class, 'updateStatus']);

Route::get('/countries', [App\Http\Controllers\CountryController::class, 'getCountries']);
Route::post('/country/store', [App\Http\Controllers\CountryController::class, 'addCountry'])->name('country.store');
Route::post('/country/update_status', [App\Http\Controllers\CountryController::class, 'updateStatus']);

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'getCompanies']);
Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'addCompany'])->name('company.store');
Route::post('/company/update_status', [App\Http\Controllers\CompanyController::class, 'updateStatus']);

Route::get('/users', [App\Http\Controllers\AccountController::class, 'getUsers']);
Route::get('/user/create', [App\Http\Controllers\AccountController::class, 'createUser']);
Route::post('/user/store', [App\Http\Controllers\AccountController::class, 'addUser'])->name('user.store');
Route::post('/user/update_status', [App\Http\Controllers\AccountController::class, 'updateStatus']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');