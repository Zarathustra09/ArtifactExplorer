<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorInformationController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/guest-survey', [GuestController::class, 'create'])->name('guest.survey.create');
Route::post('/guest-survey', [GuestController::class, 'store'])->name('guest.survey.store');

Route::get('/age-demographics', [HomeController::class, 'ageDemographics'])->name('age-demographics');
Route::get('/gender-demographics', [HomeController::class, 'genderDemographics'])->name('gender-demographics');

Route::get('/visitor/index', [VisitorInformationController::class, 'index'])->name('visitor.index');
Route::get('/visitor-information/data-table', [VisitorInformationController::class, 'dataTable'])->name('visitor-information.data-table');

