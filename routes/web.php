<?php

use App\Http\Controllers\PhotoController;
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

Route::get('/', [PhotoController::class,'index'])->name('home');
Route::get('/createPhoto', [PhotoController::class,'create'])->name('addPhoto');
Route::post('/addimg', [PhotoController::class,'store']);
Route::get('/show/{id}', [PhotoController::class,'show']);
Route::get('/edit/{id}', [PhotoController::class,'edit']);
Route::put('/edit/{id}/update', [PhotoController::class,'update']);
Route::delete('/{id}/delete', [PhotoController::class,'destroy']);
Route::post('/download/{id}', [PhotoController::class,'download']);


