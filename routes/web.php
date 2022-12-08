<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;


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
Route::resource('demande', DemandeController::class)->except('index');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('private',function(){
          return view('demandes.list');
    });
   Route::resource('dashboard', DashboardController::class);
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
