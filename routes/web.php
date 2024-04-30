<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\OrganizationsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Site\IndexController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return \Inertia\Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login')
        ->middleware('guest');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store')
        ->middleware('guest');

    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Dashboard

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

    // Users

    Route::get('users', [UsersController::class, 'index'])
        ->name('users')
        ->middleware('auth');

    Route::get('users/create', [UsersController::class, 'create'])
        ->name('users.create')
        ->middleware('auth');

    Route::post('users', [UsersController::class, 'store'])
        ->name('users.store')
        ->middleware('auth');

    Route::get('users/{user}/edit', [UsersController::class, 'edit'])
        ->name('users.edit')
        ->middleware('auth');

    Route::put('users/{user}', [UsersController::class, 'update'])
        ->name('users.update')
        ->middleware('auth');

    Route::delete('users/{user}', [UsersController::class, 'destroy'])
        ->name('users.destroy')
        ->middleware('auth');

    Route::put('users/{user}/restore', [UsersController::class, 'restore'])
        ->name('users.restore')
        ->middleware('auth');

    // Organizations

    Route::get('organizations', [OrganizationsController::class, 'index'])
        ->name('organizations')
        ->middleware('auth');

    Route::get('organizations/create', [OrganizationsController::class, 'create'])
        ->name('organizations.create')
        ->middleware('auth');

    Route::post('organizations', [OrganizationsController::class, 'store'])
        ->name('organizations.store')
        ->middleware('auth');

    Route::get('organizations/{organization}/edit', [OrganizationsController::class, 'edit'])
        ->name('organizations.edit')
        ->middleware('auth');

    Route::put('organizations/{organization}', [OrganizationsController::class, 'update'])
        ->name('organizations.update')
        ->middleware('auth');

    Route::delete('organizations/{organization}', [OrganizationsController::class, 'destroy'])
        ->name('organizations.destroy')
        ->middleware('auth');

    Route::put('organizations/{organization}/restore', [OrganizationsController::class, 'restore'])
        ->name('organizations.restore')
        ->middleware('auth');

    // Contacts

    Route::get('contacts', [ContactsController::class, 'index'])
        ->name('contacts')
        ->middleware('auth');

    Route::get('contacts/create', [ContactsController::class, 'create'])
        ->name('contacts.create')
        ->middleware('auth');

    Route::post('contacts', [ContactsController::class, 'store'])
        ->name('contacts.store')
        ->middleware('auth');

    Route::get('contacts/{contact}/edit', [ContactsController::class, 'edit'])
        ->name('contacts.edit')
        ->middleware('auth');

    Route::put('contacts/{contact}', [ContactsController::class, 'update'])
        ->name('contacts.update')
        ->middleware('auth');

    Route::delete('contacts/{contact}', [ContactsController::class, 'destroy'])
        ->name('contacts.destroy')
        ->middleware('auth');

    Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])
        ->name('contacts.restore')
        ->middleware('auth');

    // Reports

    Route::get('reports', [ReportsController::class, 'index'])
        ->name('reports')
        ->middleware('auth');

    // Images

    Route::get('/img/{path}', [ImagesController::class, 'show'])
        ->where('path', '.*')
        ->name('image');
});
