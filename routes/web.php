<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact-add',[ContactController::class,'add'])->name('contact.add');
Route::post('contact-update/{id}',[ContactController::class,'update'])->name('contact.update');
Route::delete('contact-delete/{id}',[ContactController::class,'destroy'])->name('contact.delete');


Route::get('/', function () {
    return view('register');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/user', [RegisterController::class, 'store'])->name('user.register');

Route::get('/login', [LoginController::class, 'index']);
Route::get('/delete',[LoginController::class,'destroy'])->name('logout');
Route::post('/login/user', [LoginController::class, 'store'])->name('Admin.index');


