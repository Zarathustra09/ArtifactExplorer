<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuestGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
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

Auth::routes(['register' => false]);

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
Route::post('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::delete('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');


Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/gallery/index', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/show/{id}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');



Route::delete('/gallery/image/{id}', [GalleryImageController::class, 'destroy'])->name('gallery.image.destroy');
Route::post('/gallery/{galleryId}/image', [GalleryImageController::class, 'store'])->name('gallery.image.store');
Route::post('/gallery/image/{id}/edit', [GalleryImageController::class, 'edit'])->name('gallery.image.edit');

Route::get('/gallery', [GuestGalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GuestGalleryController::class, 'show'])->name('gallery.guest.show');

Route::get('/single',function (){
    return view('gallery.single');
})->name('about');

Route::get('/contact',function (){
    return view('contact');
})->name('contact');

Route::get('/event',function (){
    return view('event');
})->name('event');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
