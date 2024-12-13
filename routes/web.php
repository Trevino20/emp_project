<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginContoller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/login',[LoginContoller::class,'index'])->name("login");
Route::get('/dashboard',[LoginContoller::class,'dashboard'])->name("dashboard");


Route::get('/home',[HomeController::class,'index']);

Route::get('/us',[StudentController::class,'index']);
Route::get('/us/shows',[StudentController::class,'Show']);


Route::get('/about/{id}',function(){
    return "hellow from about";
});

Route::get('/services/{id?}',function(){
    return "hello from services";
});

