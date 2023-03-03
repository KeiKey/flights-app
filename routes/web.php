<?php

use App\Http\Controllers\CharterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MilitaryController;
use App\Http\Controllers\NotamController;
use App\Http\Controllers\ScheduledFlightController;
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

Route::get('/', function () {return redirect()->route('login');});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'update', 'destroy']);

    Route::get('companies/download', [CompanyController::class, 'download'])->name('companies.download');
    Route::resource('companies', CompanyController::class);

    Route::get('seasons/download', [SeasonController::class, 'download'])->name('seasons.download');
    Route::resource('seasons', SeasonController::class);

    Route::get('scheduled-flights/download', [ScheduledFlightController::class, 'download'])->name('scheduled-flights.download');
    Route::resource('scheduled-flights', ScheduledFlightController::class);

    Route::resource('charters', CharterController::class);

    Route::resource('militaries', MilitaryController::class);

    Route::resource('notams', NotamController::class);
});

// + companies - should be added the season - careful the same name should not be able to be added for the same season?
// + season - should not have the company
// + add the field season name
// + scheduled - start and end date / vjen iken?
// + add the field to the filters to check by day
// + add the print to the scheduled scheduled-flights

// ? transform hours to 24h

//Scheduled - charter scheduled-flights - military overflight - notams

//charter scheduled-flights - military overflight have the same fields -

//notmas - has notifications - new notam pop up - we should get the types list and the statuess list - also the checks for the required fields
