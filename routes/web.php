<?php

use Illuminate\Support\Facades\Route;
// Frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

// Backsite
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\HospitalController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;



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
Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum','verified']], function(){
    //Appointment Pages
    Route::resource('appointment', AppointmentController::class);

    //Payment Pages
    Route::resource('payment', PaymentController::class);
});
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    //ROUTE DASHBOARD
    Route::resource('dashboard', DashboardController::class);

    // ROUTE CONFIG PAYMENT
    Route::resource('config_payment', ConfigPaymentController::class);
    
    // ROUTE CONSULTATION
    Route::resource('consultation', ConsultationController::class);

    // ROUTE DOCTOR
    Route::resource('doctor', DoctorController::class);

    // Route Hospital Patient
    Route::resource('hospital_patient', HospitalPatientController::class);


    // ROUTE PERMISSION
    Route::resource('permission', PermissionController::class);

    // ROUTE ROLE
    Route::resource('role', RoleController::class);

    // ROUTE SPECIALIST
    Route::resource('specialist', SpecialistController::class);

    // ROUTE APPOINTMENT REPORT
    Route::resource('report_appointment', ReportAppointmentController::class);
    // ROUTE TRANSACTION
    Route::resource('transaction', ReportTransactionController::class);

    // ROUTE TYPE USER
    Route::resource('type_user', TypeUserController::class);

    // ROUTE USER
    Route::resource('user', UserController::class);

});




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
