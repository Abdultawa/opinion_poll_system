<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    $questions = Question:: paginate(4);
    return view('welcome', compact('questions'));
});

Route::middleware(['auth', 'verified'])->controller(DashboardController::class)->group(function (){
    Route::get('dashboard', 'show')->name('dashboard');
    Route::post('/vote/{question}','vote')->name('vote');
    Route::get('question/show/{question}', 'showquestion')->name('question.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('can:admin')->controller(QuestionController::class)->name('admin.')->group(function (){
    Route::get('admin', 'create')->name('create');
    Route::post('question/store', 'store')->name('store');
    Route::get('/admin/{question}/edit', 'edit')->name('edit');
    Route::delete('/admin/{question}', 'destroy')->name('destroy');
    Route::get('index', 'index')->name('index');
    Route::patch('/admin/{question}/update', 'update')->name('update');
    Route::get('manageUser', 'manageUser')->name('manageUser');
    Route::delete('deleteUser/{user}', 'deleteUser')->name('deleteUser');
});

Route::get('category', [CategoryController::class, 'show'])->name('admin.category')->middleware('can:admin');
Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store')->middleware('can:admin');

require __DIR__.'/auth.php';
