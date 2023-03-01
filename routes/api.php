<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::post('/logout', [AuthController::class, 'logout']);
 

    // Route::resource('event', EventController::class);
    Route::get('/event', [EventController::class, 'getAllEvent']);
    Route::get('/event/dashboard', [EventController::class, 'getDashboardEvent']);
    
    Route::post('/event', [EventController::class, 'store']);
    Route::patch('/event/{id}', [EventController::class, 'update']);
    Route::patch('/event/status/{id}', [EventController::class, 'updateEventStatus']);
    Route::get('/event/{id}', [EventController::class, 'show']);
    Route::delete('/event/{id}', [EventController::class, 'destroy']);

   
    Route::get('/event/register/{id}', [EventRegistrationController::class, 'getEventRegistrations']);
    Route::post('/event/register', [EventRegistrationController::class, 'store']);
    Route::patch('/event/register/status/{id}', [EventRegistrationController::class, 'updateStatus']);

    Route::delete('/event/register/delete/{id}', [EventRegistrationController::class, 'destroy']);


});


//pasok sa loob to later
Route::post('/account/register/', [AuthController::class, 'register']);
Route::patch('/account/{id}/', [AuthController::class, 'updateUser']);
Route::get('/accounts/{role}', [AuthController::class, 'getUsersByType']);
Route::delete('/account/delete/{role}', [AuthController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);
