<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;

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

Route::group(['prefix'=>'/customer'],function(){
    Route::get('',[CustomerController::class,'index'])->name('customer.create');
    Route::post('',[CustomerController::class,'store']);
    Route::get('/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
    Route::get('/forcedelete/{id}',[CustomerController::class,'forcedelete'])->name('customer.forcedelete');
    Route::get('/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
    Route::get('/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('/update/{id}',[CustomerController::class,'update'])->name('customer.update');
    Route::get('/view',[CustomerController::class,'view'])->name('customer.view');
    Route::get('/trash',[CustomerController::class,'trash'])->name('customer.trash');
});



###########################################################
//!storing name in session
Route::get('/set-session',function (Request $request){
    $request->session()->put('name','sangam');
    return "Session set";
});

//!Read session
Route::get('/get-session', function (Request $request) {
    return $request->session()->get('name');
});


#######################FIle Uploading Routes###########################

Route::get('/uploads',[UploadController::class,'index']);
Route::post('/uploads',[UploadController::class,'upload']);