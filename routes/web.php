<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvenementController;
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

// Route::get('/',[EventoController::class,'index']);

Route::get('/login',[EventoController::class,'afficheLogin']);

Route::get('/register',[EventoController::class,'afficheRegister']);

Route::get('/forgot_Password',[EventoController::class,'afficheforgot_Password'])->middleware('Auth');

Route::get('/reset/{token}',[EventoController::class,'afficheReset'])->middleware('Auth');

Route::get('/dashboard',[EventoController::class,'afficheDashboard'])->middleware('Auth');

Route::get('/table',[EventoController::class,'afficheTable'])->middleware('Auth');

Route::get('/orDashboard',[EventoController::class,'afficheorDashboard'])->middleware('Auth');

Route::get('/orTables',[EventoController::class,'afficheorTables'])->middleware('Auth');

Route::get('/filter', [EventoController::class, 'filter'])->name('search');

Route::get('/',[EventoController::class,'filter']);

Route::get('/details/{id}',[EventoController::class,'details']);

////////////////////////// AUTHENTIFICATION && RESET PASSWORD //////////////////////////

Route::post('/register',[AuthController::class,'create']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/forgot_Password',[AuthController::class,'forgot_Password']);

Route::post('/reset/{token}',[AuthController::class,'resetPassword']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[RoleController::class,'getRoles']);

//////////////////////////////////////// Category ////////////////////////////////////////

Route::post('/AjouterCategory',[CategoryController::class,'AjouterCategory'])->middleware('Auth');

Route::get('/table',[CategoryController::class,'AfficheCategory'])->middleware('Auth');

Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->middleware('Auth');

Route::get('/update_category/{id}',[CategoryController::class,'getCategory'])->middleware('Auth');

Route::post('/update/category',[CategoryController::class,'updateCategory'])->middleware('Auth');



//////////////////////////////////////// Evenement  ////////////////////////////////////////


Route::post('/orTables',[EvenementController::class,'AjouterEvenement'])->middleware('Auth');

Route::get('/orTables',[EvenementController::class,'AfficheEvenement'])->middleware('Auth');

Route::get('/deleteEvenement/{id}',[EvenementController::class,'deleteEvenements'])->middleware('Auth');

Route::get('/update_Evenement/{id}',[EvenementController::class,'getEvenements'])->middleware('Auth');

Route::post('/update/Evenement',[EvenementController::class,'updateEvenements'])->middleware('Auth');

Route::get('/evenements',[EvenementController::class,'fetchEvenements'])->middleware('Auth'); ///admin : afficher pour accpter ou rejecter

Route::post('/update/Evenement', [EvenementController::class, 'AcRjEvenemen'])->middleware('Auth');///admin :  Accepter ou rejecter un evenement 


//////////////////////////////////////// users  ////////////////////////////////////////

Route::get('/users',[AuthController::class,'afficheUsers'])->middleware('Auth');

Route::post('/users',[AuthController::class,'ajouterUser'])->middleware('Auth');

Route::get('/deleteUser/{id}',[AuthController::class,'deleteUser'])->middleware('Auth');

Route::get('/update_user/{id}',[AuthController::class,'getUser'])->middleware('Auth');

Route::post('/update/user',[AuthController::class,'updateUser'])->middleware('Auth');