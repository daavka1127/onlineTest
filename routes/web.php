<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

//test
Route::get('/qwerty', [AdminController::class, 'show']);
Route::get('/Test', [AdminController::class, 'NewPage']);
Route::get('/test/new', [AdminController::class, 'NewTest']);
Route::post('/Tnew', [AdminController::class, 'create']);
Route::post('/Test/action', [AdminController::class, 'action'])->name('tabledit.action');
Route::get('/test/back', [AdminController::class, 'back']);
Route::get('/home/back', [AdminController::class, 'homeback']);
