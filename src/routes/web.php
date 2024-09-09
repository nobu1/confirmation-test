<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Contact Page
Route::get('/', function () {
    return view('index');
});
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::get('/confirm', [ContactController::class, 'redo']);
Route::post('/thanks', [ContactController::class, 'store'])->name('contact.store');

// Authorization Page
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Admin Page
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/admin/{admin}', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('admin/{admin}', [AdminController::class, 'destory'])->name('admin.destory');
});
