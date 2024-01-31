<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'homepage']);

Route::get('/portfolio-details-1', [HomeController::class, 'portfoliodetails']);
Route::get('/portfolio-details-2', [HomeController::class, 'portfoliodetails2']);
Route::get('/portfolio-details-3', [HomeController::class, 'portfoliodetails3']);





Route::get('/admin', [DashboardController::class, 'dashboardpage']);
