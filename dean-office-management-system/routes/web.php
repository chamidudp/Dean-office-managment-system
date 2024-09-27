<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\GuestController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage Route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// User Management Routes
Route::resource('users', UserController::class)->middleware(['auth', 'role:admin']); // Admin access only

// Student Management Routes
Route::resource('students', StudentController::class)->middleware(['auth', 'role:admin,staff']); // Admin and Staff access

// Document Management Routes
Route::resource('documents', DocumentController::class)->middleware(['auth']); // All authenticated users can access

// Communication System Routes
Route::resource('messages', MessageController::class)->middleware(['auth']); // All authenticated users can access

// Lecturer Guest Management Routes
Route::resource('guests', GuestController::class)->middleware(['auth', 'role:admin,staff']); // Admin and Staff access

// Authentication Routes
require __DIR__.'/auth.php';
