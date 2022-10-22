<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\AdminController::class, 'index'])->name('index');
Route::get("/login", [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post("/authenticate", [\App\Http\Controllers\AdminController::class, 'authenticate'])->name('authenticate');

Route::middleware("auth")->group(function () {
    Route::get("/dashboard", [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource("employees", EmployeeController::class);

    Route::get("/salaries", [\App\Http\Controllers\SalaryController::class, 'index'])->name('salaries');
    Route::get("/salaries/calculate", [\App\Http\Controllers\SalaryController::class, 'calculate'])->name('salaries.calculate');
    Route::get("/salaries/details", [\App\Http\Controllers\SalaryController::class, 'details'])->name('salaries.details');
    Route::get("/salaries/create", [\App\Http\Controllers\SalaryController::class, 'create'])->name('salaries.create');
    Route::post("/salaries/store", [\App\Http\Controllers\SalaryController::class, 'store'])->name('salaries.store');
    Route::delete("/salaries/{id}", [\App\Http\Controllers\SalaryController::class, 'destroy'])->name('salaries.destroy');
});
