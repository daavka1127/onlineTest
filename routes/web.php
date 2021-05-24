<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RandomQuestions;
use App\Http\Controllers\showTestController;
use App\Http\Controllers\testDadaaController;

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


//test
Route::get('/qwerty', [AdminController::class, 'show']);
Route::get('/Test', [AdminController::class, 'NewPage']);
Route::get('/test/new', [AdminController::class, 'NewTest']);
Route::post('/Tnew', [AdminController::class, 'create']);
Route::post('/Test/action', [AdminController::class, 'action'])->name('tabledit.action');
Route::get('/test/back', [AdminController::class, 'back']);
Route::get('/home/back', [AdminController::class, 'homeback']);
Route::get('/get/ques/{testID}', [RandomQuestions::class, 'getRandomQuestions']);


//Answer
Route::get('/Answer', [AnswerController::class, 'show']);
Route::get('/answer/new', [AnswerController::class, 'NewAnswer']);
Route::post('/Anew', [AnswerController::class, 'create']);
Route::get('/answer/back', [AnswerController::class, 'back']);

Route::get('/testshow', function () {
    return view('testShow');
});


// Route::get('/test/dadaa', function(){
//     return view('testDadaa');
// });
Route::get('/test/dadaa', [testDadaaController::class, 'test']);

Route::get('/test/dadaa/get/questions', [showTestController::class, 'createQuestions']);
//Lesson
Route::get('/Lesson', [LessonController::class, 'show']);
Route::get('lesson/new', [LessonController::class, 'NewLesson']);
Route::post('/Lnew', [LessonController::class, 'create']);
