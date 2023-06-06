<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});
Route::get('/people/fill-dummy-data', [PersonController::class, 'fillDummyData']);
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::post('/people', [PersonController::class, 'store']);
Route::get('/people/{person}', [PersonController::class, 'show']);
Route::put('/people/{person}', [PersonController::class, 'update']);
Route::delete('/people/{person}', [PersonController::class, 'destroy']);
