<?php

use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormationParticipantController;
use App\Http\Controllers\ParticipantController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('participants')->group(function() {
//     Route::get('/', [ParticipantController::class, 'index']);
//     Route::get('/create', [ParticipantController::class, 'create']);
//     Route::post('/', [ParticipantController::class, 'store']);
//     Route::get('/{participant}/edit', [ParticipantController::class, 'edit']);
//     Route::put('/{participant}', [ParticipantController::class, 'update']);
//     Route::delete('/{participant}', [ParticipantController::class, 'destroy']);
// });

Route::middleware('auth')->group(function() {
    Route::resource('participants', ParticipantController::class)->except('show');

    Route::resource('formations', FormationController::class)->except('show');

    Route::get('formations/{formation}', [FormationController::class, 'show'])
    ->middleware('verify.formation');

    Route::post('/formation/{formation}/participants',
    [FormationParticipantController::class, 'store']);

    Route::delete('/formation/{formation}/participants/{participant}',
    [FormationParticipantController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
