<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::get('/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/{id}', [HomeController::class, 'update'])->name('update');
Route::post('/', [HomeController::class, 'store'])->name('store');
Route::delete('/{id}', [HomeController::class, 'delete'])->name('delete');
