<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\branchcontroller;
use App\Http\Controllers\townshipcontroller;
use App\Http\Controllers\citycontroller;
use App\Http\Controllers\rolecontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\sizecontroller;
use App\Http\Controllers\colorcontroller;
use App\Http\Controllers\itemcontroller;
use App\Http\Controllers\branchitemcontroller;
use App\Http\Controllers\salecontroller;
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
    return view('Admin.login');
});

Route::get('admin',function(){
    return view('Admin_Panel.master');
});


Auth::routes();
Route::get('adminregister',[admincontroller::class,'regform']);
Route::get('/Admin/dashboard',[admincontroller::class,'admindashboard'])->name('admin.dashboard')->middleware("adminpass");
Route::get('/Admin/login',[admincontroller::class,'loginform'])->name('admin.loginform');
Route::post('/admin/loginprocess',[admincontroller::class,'loginprocess']);


Route::middleware(['adminpass'])->group(function(){
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

// Category Route
Route::resource('categoryprocess',categorycontroller::class);

// Size ROute
Route::resource('sizeprocess', sizecontroller::class);

// Color Route
Route::resource('colorprocess',colorcontroller::class);

// Item Route
Route::resource('itemprocess', itemcontroller::class);
Route::post('buttonrequest',[itemcontroller::class,"buttonreq"])->name("buttonrequest");
Route::post('ajaxdelete',[itemcontroller::class,"ajaxdelete"])->name("delete");

// BranchItem
Route::resource('branchitemprocess',branchitemcontroller::class);
Route::get('searchbranchitem',[branchitemcontroller::class,"searchbutton"]);
Route::post('detailid',[branchitemcontroller::class,"btnselected"]);
ROute::post('addinfo',[branchitemcontroller::class,"add_data"]);
Route::post('branchitemdelete',[branchitemcontroller::class,"branchitemdelete"])->name("branchitemdelete");

// Sale Controller
Route::resource('saleprocess',salecontroller::class);
Route::post('detail',[salecontroller::class,"detail"]);
Route::post('add_data',[salecontroller::class,"add_data"]);
Route::post('branchitemdelete',[salecontroller::class,"branchitemdelete"])->name("branchitemdelete");
Route::get('customersearch',[salecontroller::class,"customersearch"])->name("btncustomer");
Route::get('sale_detail/{id}',[salecontroller::class,"detail_data"]);
Route::get('generatesalepdf/{id}',[salecontroller::class,"generatepdf"]);
Route::get('exportexcel/{id}',[salecontroller::class,"export"]);
});

// Admin Route Only
Route::get('/admin/register',[admincontroller::class,"staffRegister"]);
Route::post('/admin/save',[admincontroller::class,"Register"]);
Route::get('/admin',[admincontroller::class,"stafflist"]);
Route::get('/adminsearch',[admincontroller::class,"staffsearch"]);
Route::get('/admin/{id}/edit',[admincontroller::class,"staffedit"]);
Route::post('/admin/{id}/update',[admincontroller::class,"staffupdate"]);
Route::get('/admin/{id}/detail',[admincontroller::class,"staffdetails"]);

Route::get('/customer/register',[admincontroller::class,"customerreg"]);
Route::get('/customer/list',[admincontroller::class,"customerlist"])->name('customer.list');
Route::get('/customer/{id}/detail',[admincontroller::class,"customerdetail"]);
Route::post('/customer/{id}/update',[admincontroller::class,"customerupdate"]);

// view route
// Route::view('/branch/create', 'branch.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
