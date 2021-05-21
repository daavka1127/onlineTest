<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\showTestController;

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


Route::get('/', [showTestController::class, 'showTest']);
Route::post('/login', [showTestController::class, 'login_user']);

Route::get('/', function () {
    return view('layouts.layout_user_login');
});
Route::get('/testshow', function () {
    return view('testShow');
});

