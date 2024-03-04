<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;
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

Route::get('/',[EventoController::class,'index']);

Route::get('/login',[EventoController::class,'afficheLogin']);

Route::get('/register',[EventoController::class,'afficheRegister']);

Route::post('/register',[AuthController::class,'create']);

Route::post('/login',[AuthController::class,'login']);
