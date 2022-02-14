<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SalesController;
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



Route::get('/', IndexController::class)->name('index');

Route::get('products', [ProductsController::class, 'productsView'])->name('products');
Route::post('products/create', [ProductsController::class, 'create']);

Route::get('sales/{id}', [SalesController::class, 'salesView'])->name('sales');
Route::post('sales/store', [SalesController::class, 'store'])->name("store.ajax");

Route::get('history', [HistorialController::class, 'historialView'])->name('history');

Route::get('reports', [ReportsController::class, 'reportsView'])->name('reports');

Route::get('events', [EventsController::class, 'eventsView'])->name('events');
Route::post('events/create', [EventsController::class, 'create']);
