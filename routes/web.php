<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TokenverifyMiddleware;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ResumeEduController;
use App\Http\Controllers\ResumeProEduController;

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

// Profile API & Page routes
Route::get('/user-profile', [UserController::class, 'UserProfilePage'])->middleware([TokenverifyMiddleware::class]);
Route::get('/user-info', [UserController::class, 'userprofile'])->middleware([TokenverifyMiddleware::class]);
Route::post('/user-info-update', [UserController::class, 'userupdate'])->middleware([TokenverifyMiddleware::class]);


// Auth API
Route::post('/user-login', [UserController::class, 'userlogin']);
Route::post('/user_registration', [UserController::class, 'userRegisteation']);
Route::post('/send-otp', [UserController::class, 'sentotp']);
Route::post('/verify-otp', [UserController::class, 'verifyotp']);
Route::post('/reset-password', [UserController::class, 'resetpassword'])->middleware([TokenverifyMiddleware::class]);

// Auth font end
Route::get('/login', [UserController::class, 'loginpage']);
// Route::get('/admin-registration', [UserController::class, 'registrationpage']);
Route::get('/send-otp-code', [UserController::class, 'sendotppage']);
Route::get('/verify-otp-code', [UserController::class, 'verifyotppage']);
Route::get('/password-reset', [UserController::class, 'resetpasspage'])->middleware([TokenverifyMiddleware::class]);
Route::get('/logout', [UserController::class, 'logout']);


// service API

Route::post('/service-create', [ServiceController::class, 'createService'])->middleware([TokenverifyMiddleware::class]);
Route::get('/service-list', [ServiceController::class, 'serviceList'])->middleware([TokenverifyMiddleware::class]);
Route::post('/service-update', [ServiceController::class, 'serviceUpdate'])->middleware([TokenverifyMiddleware::class]);
Route::post('/service-delete', [ServiceController::class, 'serviceDelete'])->middleware([TokenverifyMiddleware::class]);
Route::get('/service-update-by-id', [ServiceController::class, 'serviceUpdateById'])->middleware([TokenverifyMiddleware::class]);

// service data table page for Back
Route::get('/service-page', [ServiceController::class, 'serviceTable'])->middleware([TokenverifyMiddleware::class]);

// service data table page for Font
Route::get('/', [ServiceController::class, 'serviceTableFont']);


// About section API

Route::post('/create_about', [AboutController::class, 'createabout'])->middleware([TokenverifyMiddleware::class]);
Route::post('/update_about', [AboutController::class, 'updateabout'])->middleware([TokenverifyMiddleware::class]);
// Route::post('/delete_about', [AboutController::class, 'deleteabout'])->middleware([TokenverifyMiddleware::class]);
Route::get('/about_list', [AboutController::class, 'aboutlist'])->middleware([TokenverifyMiddleware::class]);


// About page

Route::get('/about-page', [AboutController::class, 'aboutItemList'])->middleware([TokenverifyMiddleware::class]);

// certificate API

Route::post('/certificate-upload', [CertificateController::class, 'createCertificate'])->middleware([TokenverifyMiddleware::class]);
Route::post('/certificate-delete', [CertificateController::class, 'certificateDelete'])->middleware([TokenverifyMiddleware::class]);
Route::get('/certificate-list', [CertificateController::class, 'certificateList'])->middleware([TokenverifyMiddleware::class]);

// certificate page for Back
Route::get('/certificate-page', [CertificateController::class, 'certificatePage'])->middleware([TokenverifyMiddleware::class]);
// certificate page for font
Route::get('/', [CertificateController::class, 'certificatePageFont']);


// Contact API
Route::post('/contact-message', [ContactController::class, 'receiveMessage'])->middleware([TokenverifyMiddleware::class]);
Route::get('/contact-list', [ContactController::class, 'messageList'])->middleware([TokenverifyMiddleware::class]);
Route::post('/message-delete', [ContactController::class, 'messageDelete'])->middleware([TokenverifyMiddleware::class]);

// contact page for admin

Route::get('/message-list', [ContactController::class, 'messageListPage'])->middleware([TokenverifyMiddleware::class]);

// skill API

Route::post('/skill-input', [SkillController::class, 'skillInput'])->middleware([TokenverifyMiddleware::class]);
Route::post('/skill-update', [SkillController::class, 'skillUpdate'])->middleware([TokenverifyMiddleware::class]);
Route::post('/skill-delete', [SkillController::class, 'skillDelete'])->middleware([TokenverifyMiddleware::class]);
Route::get('/skill-list', [SkillController::class, 'skillList'])->middleware([TokenverifyMiddleware::class]);
Route::get('/skill-update-by-id', [SkillController::class, 'skillUpdateById'])->middleware([TokenverifyMiddleware::class]);

// skill page for admin
Route::get('/skill-page', [SkillController::class, 'skillListPage'])->middleware([TokenverifyMiddleware::class]);


// project API

Route::post('create-project', [ProjectController::class, 'projectCreate'])->middleware([TokenverifyMiddleware::class]);
Route::post('update-project', [ProjectController::class, 'projectUpdate'])->middleware([TokenverifyMiddleware::class]);
Route::post('delete-project', [ProjectController::class, 'projectDelete'])->middleware([TokenverifyMiddleware::class]);
Route::get('project-list', [ProjectController::class, 'projectList'])->middleware([TokenverifyMiddleware::class]);
Route::get('project-update-by-id', [ProjectController::class, 'project_Update_By_Id'])->middleware([TokenverifyMiddleware::class]);

// project page for admin

Route::get('/project-page', [ProjectController::class, 'projectPage'])->middleware([TokenverifyMiddleware::class]);


// Resume Education API

Route::post('/input-education', [ResumeEduController::class, 'createResumeEdu'])->middleware([TokenverifyMiddleware::class]);
Route::get('/resume-education-list', [ResumeEduController::class, 'resumeEduList'])->middleware([TokenverifyMiddleware::class]);



// Resume Pro Education API

Route::post('/input-pro-education', [ResumeProEduController::class, 'createResumeProEdu'])->middleware([TokenverifyMiddleware::class]);
Route::get('/resume-pro-education-list', [ResumeProEduController::class, 'createResumeProEduList'])->middleware([TokenverifyMiddleware::class]);
