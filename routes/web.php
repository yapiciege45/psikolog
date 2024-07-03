<?php

use App\Http\Controllers\Admin\AssistantController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfficeAdminController;
use App\Http\Controllers\Admin\OfficeBranchController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\PsychologistController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OfficeAdmin\ApplicationController;
use App\Http\Controllers\OfficeAdmin\AppointmentController;
use App\Http\Controllers\OfficeAdmin\DashboardController as OfficeAdminDashboardController;
use App\Http\Controllers\OfficeAdmin\AssistantController as OfficeAdminAssistantController;
use App\Http\Controllers\OfficeAdmin\PsychologistController as OfficeAdminPsychologistController;
use App\Http\Controllers\Psychologist\DashboardController as PsychologistDashboardController;

use App\Http\Controllers\OfficeAdmin\RoomController;
use App\Http\Controllers\OfficeAdmin\SettingController as OfficeAdminSettingController;
use App\Http\Controllers\OfficeAdmin\TypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Psychologist\AppointmentController as PsychologistAppointmentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CheckIsOfficeAdmin;
use App\Http\Middleware\CheckIsPsychologist;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::post('/contact', [WelcomeController::class, 'contact'])->name('contact');

Route::middleware(CheckIsAdmin::class)->prefix('/dashboard')->name('dashboard.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('/office')->name('office.')->group(function() {
        Route::get('/', [OfficeController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [OfficeController::class, 'update'])->name('update');
        Route::post('/create', [OfficeController::class, 'store'])->name('store');
        Route::match(['get', 'delete'], '/delete/{id}', [OfficeController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/branch')->name('branch.')->group(function() {
        Route::get('/', [OfficeBranchController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [OfficeBranchController::class, 'update'])->name('update');
        Route::post('/create', [OfficeBranchController::class, 'store'])->name('store');
        Route::match(['get', 'delete'], '/delete/{id}', [OfficeBranchController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/psychologist')->name('psychologist.')->group(function() {
        Route::get('/', [PsychologistController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [PsychologistController::class, 'update'])->name('update');
        Route::post('/create', [PsychologistController::class, 'store'])->name('store');
        Route::match(['get', 'delete'], '/delete/{id}', [PsychologistController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/office-admin')->name('office_admin.')->group(function() {
        Route::get('/', [OfficeAdminController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [OfficeAdminController::class, 'update'])->name('update');
        Route::post('/create', [OfficeAdminController::class, 'store'])->name('store');
        Route::match(['get', 'delete'], '/delete/{id}', [OfficeAdminController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/assistant')->name('assistant.')->group(function() {
        Route::get('/', [AssistantController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [AssistantController::class, 'update'])->name('update');
        Route::post('/create', [AssistantController::class, 'store'])->name('store');
        Route::match(['get', 'delete'], '/delete/{id}', [AssistantController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/contact')->name('contact.')->group(function() {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::match(['get', 'delete'], '/delete/{id}', [ContactController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/question')->name('question.')->group(function() {
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::put('/edit/{id}', [QuestionController::class, 'update'])->name('update');
        Route::post('/create', [QuestionController::class, 'store'])->name('store');
        Route::match(['get', 'delete'], '/delete/{id}', [QuestionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/setting')->name('setting.')->group(function() {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/edit', [SettingController::class, 'update'])->name('update');
    });
});

Route::get('/office/{slug}/login', [AuthenticatedSessionController::class, 'create'])->name('office.login');

Route::middleware(CheckIsOfficeAdmin::class)->prefix('/office')->name('office.')->group(function() {
    Route::prefix('/{slug}/dashboard')->name('dashboard.')->group(function() {
        Route::get('/', [OfficeAdminDashboardController::class, 'index'])->name('index');

        Route::prefix('/assistant')->name('assistant.')->group(function() {
            Route::get('/', [OfficeAdminAssistantController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [OfficeAdminAssistantController::class, 'update'])->name('update');
            Route::post('/create', [OfficeAdminAssistantController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [OfficeAdminAssistantController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/psychologist')->name('psychologist.')->group(function() {
            Route::get('/', [OfficeAdminPsychologistController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [OfficeAdminPsychologistController::class, 'update'])->name('update');
            Route::post('/create', [OfficeAdminPsychologistController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [OfficeAdminPsychologistController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/room')->name('room.')->group(function() {
            Route::get('/', [RoomController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [RoomController::class, 'update'])->name('update');
            Route::post('/create', [RoomController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [RoomController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/application')->name('application.')->group(function() {
            Route::get('/', [ApplicationController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [ApplicationController::class, 'update'])->name('update');
            Route::post('/create', [ApplicationController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [ApplicationController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/type')->name('type.')->group(function() {
            Route::get('/', [TypeController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [TypeController::class, 'update'])->name('update');
            Route::post('/create', [TypeController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [TypeController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/appointment')->name('appointment.')->group(function() {
            Route::get('/', [AppointmentController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [AppointmentController::class, 'update'])->name('update');
            Route::post('/create', [AppointmentController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [AppointmentController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/setting')->name('setting.')->group(function() {
            Route::get('/', [OfficeAdminSettingController::class, 'index'])->name('index');
            Route::put('/edit', [OfficeAdminSettingController::class, 'update'])->name('update');
        });
    });
});

Route::middleware(CheckIsPsychologist::class)->prefix('/office')->name('office.')->group(function() {

    Route::prefix('/{slug}/psychologist')->name('psychologist.')->group(function() {
        Route::get('/', [PsychologistDashboardController::class, 'index'])->name('index');

        Route::prefix('/appointment')->name('appointment.')->group(function() {
            Route::get('/', [PsychologistAppointmentController::class, 'index'])->name('index');
            Route::put('/edit/{id}', [PsychologistAppointmentController::class, 'update'])->name('update');
            Route::post('/create', [PsychologistAppointmentController::class, 'store'])->name('store');
            Route::match(['get', 'delete'], '/delete/{id}', [PsychologistAppointmentController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
