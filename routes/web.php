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

Route::get('/',[App\Http\Controllers\WelcomeController::class, 'index'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/studio', [App\Http\Controllers\StudioController::class, 'index'])->name('studio');
Route::get('/add-studio', [App\Http\Controllers\StudioController::class, 'createOrUpdateForm'])->name('create-studio');
Route::get('/edit-studio/{id}', [App\Http\Controllers\StudioController::class, 'createOrUpdateForm'])->name('update-studio');
Route::post('/save/{id?}', [App\Http\Controllers\StudioController::class, 'save'])->name('save');
