<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


//This is the invoice section routes
Route::get('/invoice', [\App\Http\Controllers\InvoiceController::class, 'index']);
Route::post('/invoice', [\App\Http\Controllers\InvoiceController::class, 'store']);
Route::delete('/invoice/{id}', [\App\Http\Controllers\InvoiceController::class, 'destroy'])->middleware('auth');;
Route::get('/invoice_update/{id}', [\App\Http\Controllers\InvoiceController::class, 'showData']);
Route::post('/invoice_update', [\App\Http\Controllers\InvoiceController::class, 'update']);
//end of invoice routes

//This is the client section routes
Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'index']);
Route::post('/clients', [\App\Http\Controllers\ClientController::class, 'store']);
Route::delete('/clients/{id}', [\App\Http\Controllers\ClientController::class, 'destroy'])->middleware('auth');;
Route::get('/client_update/{id}', [\App\Http\Controllers\ClientController::class, 'showData']);
Route::post('/client_update', [\App\Http\Controllers\ClientController::class, 'update']);
//end of client routes


//This is the staff section routes
Route::get('/staff', [\App\Http\Controllers\StaffController::class, 'index']);
Route::post('/staff', [\App\Http\Controllers\StaffController::class, 'store'])->middleware('auth');;
Route::get('/staff_update/{id}', [\App\Http\Controllers\StaffController::class, 'showData']);
Route::post('/staff_update', [\App\Http\Controllers\StaffController::class, 'update'])->middleware('auth');;
//end of staff routes

Route::get('/managers', function () {
    return view('managers');
});

Route::get('/plans', function () {
    return view('plans');
});
