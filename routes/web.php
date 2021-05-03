<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\QuestionController;
use App\Http\Livewire\Search;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminAreaController;



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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/areas/{areas_id}',[Search::class])->name('areas');

Route::get('/questions/{questions_id}',[QuestionController::class,'show'])->name('question.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/questions',[QuestionController::class,'index'])->name('questions.index');

Route::post('/questions',[QuestionController::class,'store'])->name('questions.store');

Route::post('/comments/{id}',[CommentController::class,'store'])->name('comments.store');

Route::get('/blog',function (){
    return view('blog');
});

Route::get('/contact',function (){
    return view('contact');
});

Route::get('/recipe',function (){
    return view('recipe');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home',[ChatController::class,'index']);
Route::get('/message/{id}', [ChatController::class,'getMessage'])->name('message');
Route::post('message', [ChatController::class,'sendMessage']);

//管理員
Route::prefix('admin')->group(function () {
    //問題管理
    Route::get('/', [AdminQuestionController::class, 'index'])->name('admin.index');
    Route::delete('question/{id}', [AdminQuestionController::class, 'destroy'])->name('admin.questions.destroy');
    //領域管理
    Route::get('areas', [AdminAreaController::class, 'index'])->name('admin.areas.index');
    Route::delete('areas/{id}', [AdminAreaController::class, 'destroy'])->name('admin.areas.destroy');
    Route::post('areas/store', [AdminAreaController::class, 'store'])->name('admin.areas.store');
});
