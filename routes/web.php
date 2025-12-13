<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;

Route::get('/welcome/{name?}', function ($name=null) {
    $data = compact('name');
    return view('welcome')->with($data);
});

Route::get('/demo/{name}/{id?}', function($name , $id = null) {
    //!DO this to send data
    // $data = [
    //     "name"=>$name,
    //     "id"=>$id
    // ];

    //!OR use compact function like this
    $data = compact('name','id');


    return  view('demo')->with($data);
    
});

Route::get('/home',function () {
    return view('home');
});
Route::get('/about',function () {
    return view('about');
});

Route::get('/', function ()
{
   return view('index'); 
});

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'register']);


Route::get('/customer',[CustomerController::class,'index'])->name('customer.create');
Route::post('/customer',[CustomerController::class,'store']);
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer/view',[CustomerController::class,'view']);