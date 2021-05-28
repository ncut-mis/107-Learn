<?php

use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\QuestionController;
use App\Http\Livewire\Search;
use http\Client\Request;
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

Route::get('/chatroom/{id}',[ChatroomController::class,'solver'])->name('chatrooms.solver.index');
Route::get('/chatroom/{id}/messages',[ChatroomController::class,'room'])->name('chatrooms.room.index');

Route::get('/question/{id}/chatrooms',[ChatroomController::class,'roomlist'])->name('chatrooms.list.index');

Route::post('/chatrooms', [ChatroomController::class,'sendMessage']);

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
Route::get('notes',[NotesController::class,'store'])->name('note');


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
