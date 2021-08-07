<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\userController;

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
Route::view('/','home')->name('home')->middleware('login');
Route::post('/',[userController::class,'login'])->name('login');



//admin dashboard routes
Route::middleware(['adminAuth'])->group(function () {
// login 
Route::get('/admindashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
// course
Route::get('addcourse',[CourseController::class,'index'])->name('course.add');
Route::post('addcourse',[CourseController::class,'store'])->name('course.store');
Route::get('viewcourse',[CourseController::class,'show'])->name('course.show');
Route::get('editcourse/{id}',[CourseController::class,'edit'])->name('course.edit');
Route::post('updatecourse',[CourseController::class,'update'])->name('course.update');
Route::get('deletecourse/{id}',[CourseController::class,'destroy'])->name('course.delete');

// student 
Route::get('addstudent',[StudentController::class,'index'])->name('student.add');
Route::post('addstudent',[StudentController::class,'store'])->name('student.store');
Route::get('viewstudent',[StudentController::class,'show'])->name('student.show');
Route::get('editstudent/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('editstudent',[StudentController::class,'update'])->name('student.update');
Route::get('deletestudent/{id}',[StudentController::class,'destroy'])->name('student.delete');

//payment
Route::get('addpayment',[PaymentController::class,'index'])->name('payment.add');
Route::post('addpayment',[PaymentController::class,'store'])->name('payment.store');
Route::get('viewpayment',[PaymentController::class,'show'])->name('payment.show');
Route::get('editpayment/{id}',[PaymentController::class,'edit'])->name('payment.edit');
Route::post('editpayment',[PaymentController::class,'update'])->name('payment.update');
Route::get('deletepayment/{id}',[PaymentController::class,'destroy'])->name('payment.destroy');

//Report
Route::get('paymentreport',[StudentController::class,'report'])->name('payment.report');

});


//students dashboard routes

Route::middleware(['stuCheck'])->group(function () {
Route::get('/studentdashboard',[StudentController::class,'stuInfo'])->name('student.dashboard');
Route::get('/stulogout',[StudentController::class,'stuLogout'])->name('student.logout');
});


