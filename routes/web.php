<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\TokenverifyMiddleware;

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

// font-end route
Route::get('/', [HomeController::class, 'homepage']);
Route::get('/portfolio-details-1', [HomeController::class, 'portfoliodetails']);
Route::get('/portfolio-details-2', [HomeController::class, 'portfoliodetails2']);
Route::get('/portfolio-details-3', [HomeController::class, 'portfoliodetails3']);
/*///////////////////////////////*/

// Dashboard access route
Route::get('/admin', [DashboardController::class, 'dashboardpage'])->middleware([TokenverifyMiddleware::class]);



// Auth API
Route::post('/user-login', [UserController::class, 'userlogin']);
Route::post('/user_registration', [UserController::class, 'userRegisteation']);
Route::post('/send-otp', [UserController::class, 'sentotp']);
Route::post('/verify-otp', [UserController::class, 'verifyotp']);
Route::post('/reset-password', [UserController::class, 'resetpassword'])->middleware([TokenverifyMiddleware::class]);

// Auth font end

Route::get('/login', [UserController::class, 'loginpage']);
Route::get('/admin-registration', [UserController::class, 'registrationpage']);
Route::get('/send-otp-code', [UserController::class, 'sendotppage']);
Route::get('/verify-otp-code', [UserController::class, 'verifyotppage']);
Route::get('/password-reset', [UserController::class, 'resetpasspage'])->middleware([TokenverifyMiddleware::class]);
Route::get('/logout', [UserController::class, 'logout']);


// Services API

Route::post('/services_content', [ServiceController::class, 'service_content_create'])->middleware([TokenverifyMiddleware::class]);





