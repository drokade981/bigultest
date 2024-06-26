<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ComboPlanController;
use App\Http\Controllers\EligibilityCriteriaController;

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

Route::get('/', [PlanController::class, 'index']);

Route::resource('plans', PlanController::class);
Route::resource('combo', ComboPlanController::class);
Route::resource('eligibility', EligibilityCriteriaController::class);
