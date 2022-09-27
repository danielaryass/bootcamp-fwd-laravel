<?php

use Illuminate\Support\Facades\Route;
// Frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

// Backsite
use App\Http\Controllers\Backsite\DashboardController;
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

Route::group(['middlware' => ['auth:sanctum','verified']], function(){
    //Appointment Pages
    Route::resource('appointment', AppointmentController::class);

    //Payment Pages
    Route::resource('payment', PaymentController::class);
});
Route::group(['prefix'=> 'backsite', 'as' => 'backsite', 'middlware' => ['auth:sanctum','verified']], function(){
    //ROUTE DASHBOARD
    Route::resource('dashboard', DashboardController::class);

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
