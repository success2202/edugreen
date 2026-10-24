<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageContrroller;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentPasswordResetController;
use App\Http\Controllers\ScholarshipApplicationController;
use Illuminate\Support\Facades\Route;





Route::get('/student/login', [StudentAuthController::class, 'showLogin'])
    ->name('student.login');

Route::post('/student/login', [StudentAuthController::class, 'login'])
    ->name('student.login.submit');

if (class_exists('App\\Http\\Controllers\\StudentDashboardController')) {
    Route::get('/student/dashboard', ['App\\Http\\Controllers\\StudentDashboardController', 'index'])
        ->name('student.dashboard');

    Route::post('/student/dashboard/results', ['App\\Http\\Controllers\\StudentDashboardController', 'checkResult'])
        ->name('student.results.check');
}

Route::post('/student/logout', [StudentAuthController::class, 'logout'])
    ->name('student.logout');

// Student forgot password
Route::get(
    '/student/forgot-password',
    [StudentPasswordResetController::class, 'showForgotForm']
)->name('student.password.request');

Route::post(
    '/student/forgot-password',
    [StudentPasswordResetController::class, 'sendResetLink']
)->middleware('throttle:5,1')->name('student.password.email');

// Student reset password
Route::get(
    '/student/reset-password/{token}',
    [StudentPasswordResetController::class, 'showResetForm']
)->name('student.password.reset');

Route::post(
    '/student/reset-password/{token}',
    [StudentPasswordResetController::class, 'resetPassword']
)->middleware('throttle:5,1')->name('student.password.update');

    
Route::get('/', [HomeController::class, 'Index'])->name('user.home');

Route::controller(PageContrroller::class)->group(function () {
    Route::get('/teachers', 'Index')->name('user.teacher');
    Route::get('/teacher/{id}', 'TeacherDetails')->name('user.teacher.details');
    Route::get('/events', 'Events')->name('user.events');
    Route::get('/event/{id}', 'EventDetails')->name('user.event.details');
    Route::get('/about-Us', 'About')->name('user.about');
    Route::get('/blogs', 'Blog')->name('user.blog'); 
    Route::get('/blog/{id}', 'BlogDetails')->name('user.blog.details');
    Route::get('/contact', 'Contact')->name('user.contact');
    Route::get('/gallery', 'Gallery')->name('user.gallery');
    Route::get('/proprietress/profile', 'Profile')->name('user.proprietress');
    Route::get('/scholarship/advancement', 'Advancement')->name('user.scholarship.advancement');
    Route::get('/scholarship/giving/', 'Giving')->name('user.scholarship.giving');
    Route::get('/scholarchip', 'Scholarship')->name('user.scholarship');
    Route::get('/privacy-policy', 'Policy')->name('user.policy');
    Route::get('/curriculum', 'SchoolCurriculum')->name('school.curriculum');
    Route::get('/terms-condition', 'TermsCondition')->name('user.terms');
    Route::get('/service', 'Service')->name('user.services');
   
    // Route::get('/application', 'Application')->name('user.application');
    // Route::post('/application', 'storeApplication')->name('user.store.application');
});

Route::controller(ApplicationController::class)->group(function () {
    Route::get('/application', 'application')->name('user.application');
    Route::post('/application', 'store')->name('user.store.application');
});


Route::controller(ScholarshipApplicationController::class)->group(function () {
     Route::get('/scholarship/application', 'CreateScholarship')->name('user.scholarship.application');
    Route::post('/scholarship/store', 'StoreApplication')->name('user.scholarship.application.store');
});


Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');


Route::controller('App\\Http\\Controllers\\StudentResultController')->group(function () {
    Route::get('/student/result-check', 'ResultCheck')->name('result.check');
    Route::post('/student/result-check', 'lookupResult')->name('result.lookup');
});