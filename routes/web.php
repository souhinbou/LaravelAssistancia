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
    Route::get('AttCour',[DemandeController::class,'attente_encour'])->name('attente.cour');
    Route::get('traitee',[DemandeController::class,'encour_traite'])->name('encour.traite');
    Route::resource('dashboard',DashboardController::class);
});
Route::get('mail',function(){
    $demande=Demande::first();

    $admin = User::first();
    return new SendNewDemandeMail($demande, $admin);
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
