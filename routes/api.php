<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\DiagnoseController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\HospitalUsersController;
use App\Http\Controllers\Api\HospitalPatientsController;
use App\Http\Controllers\Api\PatientDiagnosesController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('hospitals', HospitalController::class);

        // Hospital Users
        Route::get('/hospitals/{hospital}/users', [
            HospitalUsersController::class,
            'index',
        ])->name('hospitals.users.index');
        Route::post('/hospitals/{hospital}/users', [
            HospitalUsersController::class,
            'store',
        ])->name('hospitals.users.store');

        // Hospital Patients
        Route::get('/hospitals/{hospital}/patients', [
            HospitalPatientsController::class,
            'index',
        ])->name('hospitals.patients.index');
        Route::post('/hospitals/{hospital}/patients', [
            HospitalPatientsController::class,
            'store',
        ])->name('hospitals.patients.store');

        Route::apiResource('patients', PatientController::class);

        // Patient Diagnoses
        Route::get('/patients/{patient}/diagnoses', [
            PatientDiagnosesController::class,
            'index',
        ])->name('patients.diagnoses.index');
        Route::post('/patients/{patient}/diagnoses', [
            PatientDiagnosesController::class,
            'store',
        ])->name('patients.diagnoses.store');

        Route::apiResource('diagnoses', DiagnoseController::class);
    });
