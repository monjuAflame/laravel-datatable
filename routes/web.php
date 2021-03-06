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

Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
Route::get('/datatable', [\App\Http\Controllers\CustomerController::class, 'datatable'])->name('customers.datatable');
Route::get('/ajax', [\App\Http\Controllers\CustomerController::class, 'ajax'])->name('customers.ajax');
