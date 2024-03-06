<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
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

//////////////////////////////////////// VIEWS ////////////////////////////////////////

Route::get('/',[EventoController::class,'index']);

Route::get('/login',[EventoController::class,'afficheLogin']);

Route::get('/register',[EventoController::class,'afficheRegister']);

Route::get('/forgot_Password',[EventoController::class,'afficheforgot_Password']);

Route::get('/reset/{token}',[EventoController::class,'afficheReset']);

Route::get('/dashboard',[EventoController::class,'afficheDashboard']);

Route::get('/table',[EventoController::class,'afficheTable']);


////////////////////////// AUTHENTIFICATION && RESET PASSWORD //////////////////////////

Route::post('/register',[AuthController::class,'create']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/forgot_Password',[AuthController::class,'forgot_Password']);

Route::post('/reset/{token}',[AuthController::class,'resetPassword']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[RoleController::class,'getRoles']);

//////////////////////////////////////// Category ////////////////////////////////////////

Route::post('/AjouterCategory',[CategoryController::class,'AjouterCategory']);

Route::get('/table',[CategoryController::class,'getCategory']);

Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCategory']);
