<?php

use App\Http\Middleware\validation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupportConstroller;

Route::get('/register', function () {return view('admin.register');});
Route::post('registersave',[UserController::class,'register'])->name('registerSave');

Route::get('/',[HomeController::class,'index']);

Route::get('/home/login',[UserController::class,'index'])->name("login");
Route::post('/dashboard', [Usercontroller::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [Usercontroller::class,'logout'])->name('logout')->middleware(validation::class);
// Route::post('/dashboard', [Usercontroller::class, 'dashboard'])->name('dashboard');



// Create New Record
Route::get('/newrecord',[AppController::class,"index"])->name('new.record');
Route::post('/newrecordstore',[AppController::class,"Store"])->name('record.store');

 // Student table Route
 Route::get('/student',[StudentController::class, 'studentview'])->name('student.view');
 Route::middleware([validation::class])->group(function(){
    Route::get('/studenttable',[StudentController::class,'index'])->name('student.table');
    Route::get('/studentshow/{id}/show',[StudentController::class,'Show'])->name('StudentShow');
    Route::get('/update/{id}student',[StudentController::class,'edit'])->name("studentedit");
    Route::put('Update.student.detail/{id}',[StudentController::class,'update'])->name("update.student");
    Route::get('createStudent',[StudentController::class,'create'])->name('create.student');
    Route::post('/studentCreate',[StudentController::class,'store'])->name('store.student');
});



// Support Staff table
Route::get('staff-table',[SupportConstroller::class,'index'])->name('staff.table');
Route::get('/staff',[SupportConstroller::class,'showEmp'])->name('emp.index');




// Teacher Table routes
Route::resource('/colleges', CollegeController::class)->names([
    'index' => 'colleges.index',
    'create' => 'colleges.create',
    'store' => 'colleges.store',
    'show' => 'colleges.show',
    'edit' => 'colleges.edit',
    'update' => 'colleges.update',
    'destroy' => 'colleges.destroy',
])->middleware(validation::class);