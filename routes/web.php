<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UserController;
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

Auth::routes(['verify' => true]);
Route::get('/', function () {return view('welcome');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'update', 'destroy']);
    Route::resource('companies', CompanyController::class);
    Route::resource('seasons', SeasonController::class);
    Route::resource('flights', FlightController::class);
//});
