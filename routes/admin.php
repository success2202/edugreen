<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\SchoolFeePaymentController;
use App\Http\Controllers\Admin\ScholarshipApplicationController;

Route::prefix('manage')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('admin.login.submit');
        Route::get('/login', 'showLogin')->name('admin-login');

        // Register
        Route::get('/register', 'showRegister')
            ->name('admin.register');

        Route::post('/register', 'register')
            ->name('admin.register.submit');

        Route::post('/logout', 'logout')->name('admin.logout');
    

      Route::controller(DashboardController::class)->middleware('auth:admin')->group(function () {
            Route::get('/', 'index')->name('admin.dashboard');
       

    // Route::get('/', [DashboardController::class, 'index'])
    // ->middleware('auth:admin')
    // ->name('admin.dashboard');


      Route::controller(TeacherController::class)->group(function () {
            Route::get('/teacher', 'Index')->name('admin.teachers.index');
            Route::get('/teacher/create', 'create')->name('admin.teachers.create');
            Route::post('/teacher/store', 'store')->name('admin.teachers.store');
            Route::put('/teacher/update/{id}', 'update')->name('admin.teachers.update');
            Route::get('/teacher/edit/{id}', 'showEditForm')->name('admin.teachers.edit');
            Route::delete('/teacher/delete/{id}', 'destroy')->name('admin.teachers.destroy');
           
        });


        Route::controller(StudentController::class)->group(function () {
            Route::get('/students', 'Index')->name('admin.students.index');
            Route::get('/students/create', 'create')->name('admin.students.create');
            Route::post('/students/store', 'store')->name('admin.students.store'); 
            Route::put('/students/update/{id}', 'update')->name('admin.students.update');
            Route::get('/students/edit/{id}', 'showEditForm')->name('admin.students.edit');
            Route::delete('/students/delete/{id}', 'destroy')->name('admin.students.destroy');
            Route::get('/students/{id}', 'show')->name('admin.students.show');
            Route::get('/students/create-result/{id}', 'createResult')->name('admin.students.createResult');
            Route::post('/students/store-result/{id}', 'storeResult')->name('admin.students.storeResult');
            Route::get('/students/result/{id}', 'showResult')->name('admin.students.result');
            Route::get('/students/{student}/result/{result}/edit', 'editResult')->name('admin.students.result.edit');
            Route::put('/students/{student}/result/{result}', 'updateResult')->name('admin.students.result.update');
            Route::get('/students/{student}/result/print', 'printResult')->name('admin.students.result.print');
            Route::post('/students/{student}/result/{result}', 'destroyResult')->name('admin.students.result.destroy');
            
        });

        Route::controller(EventController::class)->group(function () {
            Route::get('/events', 'Index')->name('admin.events.index');
            Route::get('/event/create', 'create')->name('admin.events.create');
            Route::post('/event/store', 'store')->name('admin.events.store');
            Route::get('/event/edit/{id}', 'showEditForm')->name('admin.events.edit');
            Route::put('/event/update/{id}', 'update')->name('admin.events.update');
            Route::delete('/event/delete/{id}', 'destroy')->name('admin.events.destroy');
           
        });


        Route::controller(BlogController::class)->group(function () {
            Route::get('/blog', 'Index')->name('admin.blogs.index');
            Route::get('/blog/create', 'create')->name('admin.blogs.create');
            Route::post('/blog/store', 'store')->name('admin.blogs.store');
            Route::get('/blog/edit/{id}', 'showEditForm')->name('admin.blogs.edit');
            Route::put('/blog/update/{id}', 'update')->name('admin.blogs.update');
            Route::delete('/blog/delete/{id}', 'destroy')->name('admin.blogs.destroy');
           
        });


        Route::controller(GalleryController::class)->group(function () {
            Route::get('/gallery', 'Index')->name('admin.gallery.index');
            Route::get('/gallery/create', 'create')->name('admin.gallery.create');
            Route::post('/gallery/store', 'store')->name('admin.gallery.store');
            Route::get('/gallery/edit/{id}', 'showEditForm')->name('admin.gallery.edit');
            Route::put('/gallery/update/{id}', 'update')->name('admin.gallery.update');
            Route::delete('/gallery/delete/{id}', 'destroy')->name('admin.gallery.destroy');
           
        });



        // Route::controller(UserController::class)->group(function () {
        //     Route::get('/users', 'Index')->name('admin.users.index');
        //     Route::post('/user/create', 'create')->name('admin.user.create');
        //     Route::get('/user/store', 'store')->name('admin.user.store');
        //     Route::get('/user/edit/{id}', 'showEditForm')->name('admin.user.edit');
        //     Route::put('/user/update/{id}', 'update')->name('admin.user.update');
           
        // });


        Route::controller(AdmissionController::class)->group(function () { 
            Route::get('/applications', 'applications')->name('admin.admissions.applications');
            Route::get('/application/{id}', 'showApplication')->name('admin.admissions.applications.show');
            Route::put('/application/{id}/status', 'updateStatus')->name('admin.admissions.applications.updateStatus');
            Route::post('/application/{id}/admit', 'admitApplicant')->name('admin.admissions.applications.admitApplicant');
        });

        Route::controller(AdmissionController::class)->group(function () {
            Route::get('/admissions', 'Index')->name('admin.admissions.index');
            // Route::post('/admission/create', 'create')->name('admin.admission.create');
            // Route::get('/admission/store', 'store')->name('admin.admission.store');
            // Route::get('/admission/edit/{id}', 'showEditForm')->name('admin.admission.edit');
            // Route::put('/admission/update/{id}', 'update')->name('admin.admission.update');
           
        });

        Route::controller(AcademicController::class)->group(function () {
            Route::get('/academics', 'Index')->name('admin.academics.index');
            Route::post('/academic/create', 'create')->name('admin.academic.create');
            Route::get('/academic/store', 'store')->name('admin.academic.store');
            Route::get('/academic/edit/{id}', 'showEditForm')->name('admin.academic.edit');
            Route::put('/academic/update/{id}', 'update')->name('admin.academic.update');
           
        });



        Route::controller(SettingController::class)->group(function () {
            Route::get('/settings', 'index')->name('admin.settings.index');
            Route::put('/settings/update', 'update')->name('admin.settings.update');

});

        Route::controller(AboutPageController::class)->group(function () {
            Route::get('/about', 'index')->name('admin.about.index');
            Route::get('/about/{id}/edit', 'edit')->name('admin.about.edit');
            Route::put('/about/{id}/update', 'update')->name('admin.about.update');
           
            Route::delete('/about/delete', 'destroy')->name('admin.about.destroy');
           
            Route::get('/about/create', 'create')->name('admin.about.create');
            Route::post('/about/store', 'store')->name('admin.about.store');
        });


        
Route::get(
    '/students/{studentId}/fees',
    [SchoolFeePaymentController::class, 'index'])->name('admin.students.fees.index');

Route::post(
    '/students/{studentId}/fees/mark-paid',
    [SchoolFeePaymentController::class, 'markPaid'])->name('admin.students.fees.mark-paid');

Route::patch(
    '/students/{studentId}/fees/mark-unpaid',
    [SchoolFeePaymentController::class, 'markUnpaid'])->name('admin.students.fees.mark-unpaid');



Route::get('/scholarship-applications', [ScholarshipApplicationController::class,
    'index'])->name('admin.scholarship-applications.index');

Route::get('/scholarship-applications/{id}', [ScholarshipApplicationController::class,
    'show'])->name('admin.scholarship-applications.show');

Route::put('/scholarship-applications/{id}/status', [ ScholarshipApplicationController::class,
    'updateStatus'])->name('admin.scholarship-applications.update-status');

});

});

 });