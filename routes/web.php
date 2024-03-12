<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
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

Route::get('/dashboard',[EventoController::class,'afficheDashboard'])->middleware('Admin');

Route::get('/table',[EventoController::class,'afficheTable'])->middleware('Admin');

Route::get('/orDashboard',[EventoController::class,'afficheorDashboard'])->middleware('Organisateur');

Route::get('/orTables',[EventoController::class,'afficheorTables'])->middleware('Organisateur');

Route::get('/filter', [EventoController::class, 'filter']);

Route::get('/',[EventoController::class,'filter'])->name('search');

Route::get('/details/{id}',[EventoController::class,'details']);

Route::get('/orDashboard',[EventoController::class,'StatistiqueOragnisateur'])->middleware('Organisateur','Admin');

////////////////////////// AUTHENTIFICATION && RESET PASSWORD //////////////////////////

Route::post('/register',[AuthController::class,'create']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/forgot_Password',[AuthController::class,'forgot_Password']);

Route::post('/reset/{token}',[AuthController::class,'resetPassword']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[RoleController::class,'getRoles']);

//////////////////////////////////////// Category ////////////////////////////////////////

Route::post('/AjouterCategory',[CategoryController::class,'AjouterCategory'])->middleware('Admin');

Route::get('/table',[CategoryController::class,'AfficheCategory'])->middleware('Admin');

Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->middleware('Admin');

Route::get('/update_category/{id}',[CategoryController::class,'getCategory'])->middleware('Admin');

Route::post('/update/category',[CategoryController::class,'updateCategory'])->middleware('Admin');



//////////////////////////////////////// Evenement  ////////////////////////////////////////

Route::get('/orTables',[EvenementController::class,'AfficheEvenement'])->middleware('Organisateur');

Route::post('/orTables',[EvenementController::class,'AjouterEvenement'])->middleware('Organisateur');

Route::get('/deleteEvenement/{id}',[EvenementController::class,'deleteEvenements'])->middleware('Organisateur');

Route::get('/update_Evenement/{id}',[EvenementController::class,'getEvenements'])->middleware('Organisateur');

Route::post('/update/Evenement',[EvenementController::class,'updateEvenements'])->middleware('Organisateur');

Route::get('/evenements',[EvenementController::class,'fetchEvenements'])->middleware('Organisateur'); ///admin : afficher pour accpter ou rejecter

Route::post('/update-evenements', [EvenementController::class, 'AcRjEvenemen'])->middleware('Organisateur');///admin :  Accepter ou rejecter un evenement

Route::post('/update/type', [EvenementController::class, 'type'])->middleware('Organisateur');///admin :  Manuell ou Auto reservation 


//////////////////////////////////////// users  ////////////////////////////////////////

Route::get('/users',[AuthController::class,'afficheUsers'])->middleware('Admin');

Route::post('/users',[AuthController::class,'ajouterUser'])->middleware('Admin');

Route::get('/deleteUser/{id}',[AuthController::class,'deleteUser'])->middleware('Admin');

Route::get('/update_user/{id}',[AuthController::class,'getUser'])->middleware('Admin');

Route::post('/update/user',[AuthController::class,'updateUser'])->middleware('Admin');

Route::post('/get/ticket',[ReservationController::class, 'ticket']);////////// Creer une reservation

// Route::get('/details',[ReservationController::class, 'ticket']); 

Route::get('/manuel_reservation',[ReservationController::class, 'reservation_manuell'])->middleware('Organisateur'); ///// Afficher la page pour accepter ou rejecter une reservation

Route::post('/reservation/status',[ReservationController::class, 'approve_manuell'])->middleware('Organisateur'); ///// Update status :  accepter ou rejecter une reservation  

Route::post('/get/pdf/{id}',[PDFController::class, 'generatePDF'])->middleware('User'); ///// Générer PDF


