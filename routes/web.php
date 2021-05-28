<?php

use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\NotesControllerController;
use App\Http\Livewire\Search;
use http\Client\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/areas/{areas_id}',[Search::class])->name('areas');

Route::get('/chatrooms/solver/{id}',[ChatroomController::class,'index'])->name('chatrooms.solver.index');
Route::get('/chatrooms/asker/{id}',[ChatroomController::class,'index2'])->name('chatrooms.asker.index');

//Route::get('/chatrooms/{id}', [ChatroomController::class,'getMessage'])->name('message');
Route::get('/chatrooms/OK/{id}', [ChatroomController::class,'OK'])->name('yuyu');


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


//Route::get('/home',[ChatController::class,'index']);
//Route::get('/message/{id}', [ChatController::class,'getMessage'])->name('message');
//Route::post('message/{id}', [ChatController::class,'sendMessage']);
