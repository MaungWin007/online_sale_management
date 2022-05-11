<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\branchcontroller;
use App\Http\Controllers\townshipcontroller;
use App\Http\Controllers\citycontroller;
use App\Http\Controllers\rolecontroller;
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

Route::get('admin',function(){
    return view('Admin_Panel.master');
});


Auth::routes();
Route::get('adminregister',[admincontroller::class,'regform']);
Route::get('/Admin/dashboard',[admincontroller::class,'admindashboard'])->name('admin.dashboard');
Route::get('/Admin/login',[admincontroller::class,'loginform'])->name('admin.loginform');
Route::get('/admin/loginprocess',[admincontroller::class,'loginprocess']);

// branch route
Route::resource('branchprocess', branchcontroller::class);
Route::get('branchsearch',[branchcontroller::class,"searchprocess"]);

// township route
Route::resource('townshipprocess',townshipcontroller::class);
Route::get('townshipsearch',[townshipcontroller::class,"searchprocess"]);

// City route

Route::resource('cityprocess',citycontroller::class);
Route::get('citysearch',[citycontroller::class,"searchprocess"]);

// Role Route
Route::resource('roleprocess', rolecontroller::class);
Route::get('rolesearch',[rolecontroller::class,"searchprocess"]);

// Admin Route Only
Route::get('/admin/register',[admincontroller::class,"staffRegister"]);
Route::post('/admin/save',[admincontroller::class,"Register"]);
Route::get('/admin',[admincontroller::class,"stafflist"]);
Route::get('/adminsearch',[admincontroller::class,"staffsearch"]);
Route::get('/admin/{id}/edit',[admincontroller::class,"staffedit"]);
Route::post('/admin/{id}/update',[admincontroller::class,"staffupdate"]);
Route::get('/admin/{id}/detail',[admincontroller::class,"staffdetails"]);

Route::get('/customer/register',[admincontroller::class,"customerreg"]);
Route::get('/customer/list',[admincontroller::class,"customerlist"]);
Route::get('/customer/{id}/detail',[admincontroller::class,"customerdetail"]);
Route::post('/customer/{id}/update',[AdminController::class,"customerupdate"]);

// view route
// Route::view('/branch/create', 'branch.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
