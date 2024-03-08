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

Route::get('/forgot_Password',[EventoController::class,'afficheforgot_Password']);

Route::get('/reset/{token}',[EventoController::class,'afficheReset']);

Route::get('/dashboard',[EventoController::class,'afficheDashboard']);

Route::get('/table',[EventoController::class,'afficheTable']);

Route::get('/orDashboard',[EventoController::class,'afficheorDashboard']);

Route::get('/orTables',[EventoController::class,'afficheorTables']);

Route::get('/filter', [EventoController::class, 'filter']);

Route::get('/',[EventoController::class,'filter'])->name('search');

Route::get('/details/{id}',[EventoController::class,'details']);

////////////////////////// AUTHENTIFICATION && RESET PASSWORD //////////////////////////

Route::post('/register',[AuthController::class,'create']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/forgot_Password',[AuthController::class,'forgot_Password']);

Route::post('/reset/{token}',[AuthController::class,'resetPassword']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[RoleController::class,'getRoles']);

//////////////////////////////////////// Category ////////////////////////////////////////

Route::post('/AjouterCategory',[CategoryController::class,'AjouterCategory']);

Route::get('/table',[CategoryController::class,'AfficheCategory']);

Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCategory']);

Route::get('/update_category/{id}',[CategoryController::class,'getCategory']);

Route::post('/update/category',[CategoryController::class,'updateCategory']);



//////////////////////////////////////// Evenement  ////////////////////////////////////////


Route::post('/orTables',[EvenementController::class,'AjouterEvenement']);

Route::get('/orTables',[EvenementController::class,'AfficheEvenement']);

Route::get('/deleteEvenement/{id}',[EvenementController::class,'deleteEvenements']);

Route::get('/update_Evenement/{id}',[EvenementController::class,'getEvenements']);

Route::post('/update/Evenement',[EvenementController::class,'updateEvenements']);

Route::get('/evenements',[EvenementController::class,'fetchEvenements']); ///admin : afficher pour accpter ou rejecter

Route::post('/update/Evenement', [EvenementController::class, 'AcRjEvenemen']);///admin :  Accepter ou rejecter un evenement 


//////////////////////////////////////// users  ////////////////////////////////////////

Route::get('/users',[AuthController::class,'afficheUsers']);

Route::post('/users',[AuthController::class,'ajouterUser']);

Route::get('/deleteUser/{id}',[AuthController::class,'deleteUser']);

Route::get('/update_user/{id}',[AuthController::class,'getUser']);

Route::post('/update/user',[AuthController::class,'updateUser']);