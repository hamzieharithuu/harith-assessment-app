<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Livewire\CompanyCreate;
use App\Livewire\CompanyEdit;
use App\Livewire\CompanyList;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {

    // Route::get('/', [CompanyController::class, 'index'])->name('index');
    Route::get('/', CompanyList::class)->name('company.list');
    Route::get('/company-create', CompanyCreate::class)->name('company.create');
    Route::get('/company-edit/{id}', CompanyEdit::class)->name('company.edit');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});
