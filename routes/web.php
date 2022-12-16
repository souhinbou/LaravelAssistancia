<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;
use App\Mail\SendNewDemandeMail;
use App\Models\Demande;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('demande', DemandeController::class);

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/private',function(){
          return view('admin.list');
    });

    Route::get('list',[DashboardController::class,'listdemande'])->name('list.demande');
    //cette route permet de passer la demande attente vers En cours
    Route::get('AttCour/{id}',[DemandeController::class,'attente_encour'])->name('AttCour');
    //cette route permet d'appeler la fonction rejeter pour passer la demande  en attente vers rejetee
    Route::get('rejete/{demande}',[DemandeController::class,'rejeter'])->name('rejetee');
    //cette route permet d'appeler la fonction traiter pour passer la demande en attente vers rejetee
    Route::get('traite/{demande}',[DemandeController::class,'traiter'])->name('traitee');
    // cette route permet d'apppeler la fonction rejet pour aller dans la page rejeter.blade.php
    Route::get('rejett',[DemandeController::class,'rejet'])->name('rejeet');
    Route::resource('dashboard',DashboardController::class);
});
Route::get('mail',function(){
    $demande=Demande::first();

    $admin = User::first();
    return new SendNewDemandeMail($demande, $admin);
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
