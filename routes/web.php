<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\PermissionController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware(['auth', 'check.active'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::post('users/activation/{user}', [UserController::class,'activation'])->name('users.activation');
        Route::resource('hospitals', HospitalController::class);
        Route::post('patients/success/{patient}', [PatientController::class, 'success'])->name('patients.success');
        Route::post('patients/failed/{patient}', [PatientController::class, 'failed'])->name('patients.failed');
        Route::resource('patients', PatientController::class);
        Route::resource('diagnoses', DiagnoseController::class);
        Route::resource('templates', TemplateController::class);
        Route::resource('cities', CityController::class);
        Route::get('profile', [
            \App\Http\Controllers\ProfileController::class,
            'show',
        ])->name('profile.show');
        Route::put('profile', [
            \App\Http\Controllers\ProfileController::class,
            'update',
        ])->name('profile.update');
    });
