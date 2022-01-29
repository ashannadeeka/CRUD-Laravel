<?php

use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

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

//Main view
Route::get('/', [UserRegisterController::class , 'viewUsers'])->name('home');
//To Save New User
Route::post('/save-new-user', [UserRegisterController::class , 'saveUser']);
//To check email existst
Route::get('/check-email/{value}', [UserRegisterController::class , 'checkEmail']);

