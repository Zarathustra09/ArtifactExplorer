<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/age-demographics', [HomeController::class, 'ageDemographics'])->name('age-demographics');
Route::get('/gender-demographics', [HomeController::class, 'genderDemographics'])->name('gender-demographics');
Route::get('/most-visited', [HomeController::class, 'mostVisited'])->name('most-visited');
Route::get('/most-visited-today', [HomeController::class, 'visitToday'])->name('most-visited-today');
Route::get('/most-visited-month', [HomeController::class, 'visitThisMonth'])->name('most-visited-month');

Route::get('/guest-survey', [GuestController::class, 'create'])->name('guest.survey.create');
Route::post('/guest-survey', [GuestController::class, 'store'])->name('guest.survey.store');


Route::get('/visitor/index', [VisitorInformationController::class, 'index'])->name('visitor.index');
Route::get('/visitor-information/data-table', [VisitorInformationController::class, 'dataTable'])->name('visitor-information.data-table');
Route::get('/visitor-information', [VisitorInformationController::class, 'getVisitorData'])->name('visitor.info');
Route::get('/visitor/export', [VisitorInformationController::class, 'export'])->name('visitor.export');

Route::get('/visitor/demographics/{entryId}', [VisitorInformationController::class, 'view'])->name('visitor.demographics');

Route::get('/feedback-survey', [FeedbackController::class, 'create'])->name('feedback.survey.create');
Route::post('/feedback-survey', [FeedbackController::class, 'store'])->name('feedback.survey.store');


Route::post('/save-charts', [ChartController::class, 'saveCharts'])->name('save.charts');
Route::get('/print-charts', [ChartController::class, 'printCharts'])->name('print.charts');

Route::get('/event/admin', [EventController::class, 'index'])->name('event.index');
Route::get('/event/data', [EventController::class, 'getEvents'])->name('event.data');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');


Route::get('/gallery',function (){
    return view('gallery.gallery');
})->name('gallery');

Route::get('/single',function (){
    return view('gallery.single');
})->name('about');

Route::get('/contact',function (){
    return view('contact');
})->name('contact');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
