<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\UserController;

Route::get('/register', function () {return view('admin.register');});
Route::post('registersave',[UserController::class,'register'])->name('registerSave');

Route::get('/home/login',[UserController::class,'index'])->name("login");
Route::post('/dashboard', [Usercontroller::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [Usercontroller::class,'logout'])->name('logout');
// Route::post('/dashboard', [Usercontroller::class, 'dashboard'])->name('dashboard');




Route::get('/',[HomeController::class,'index']);


Route::get('/us',[StudentController::class,'index'])->name('table');
Route::get('/studenttable',[StudentController::class,'index'])->name('student.table');

  
Route::resource('/colleges', CollegeController::class)->names([
    'index' => 'colleges.index',
    'create' => 'colleges.create',
    'store' => 'colleges.store',
    'show' => 'colleges.show',
    'edit' => 'colleges.edit',
    'update' => 'colleges.update',
    'destroy' => 'colleges.destroy',
]);