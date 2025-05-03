<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/',[TestController::class,'index'])->name('Sanaullah.user');
Route::post('/userpost',[TestController::class,'store'])->name('user.post');
Route::get('/records',[TestController::class,'show'])->name('Sanaullah.list');

Route::post('/useredit',[TestController::class,'edit'])->name('user.edit');
Route::post('/userdelete',[TestController::class,'destroy'])->name('user.delete');
Route::post('/userupdate',[TestController::class,'update'])->name('user.update');
