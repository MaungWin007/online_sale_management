<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
