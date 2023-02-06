<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Route::get('/students', [HomeController::class, 'index'])->name('home');
Route::get('/students/create', [HomeController::class, 'create'])->name('students.create');
Route::post('/students', [HomeController::class, 'save'])->name('students.save');
Route::get('/students/edit/{student}', [HomeController::class, 'edit'])->name('students.edit');
Route::get('/students/{student}', [HomeController::class, 'show'])->name('students.show');
Route::put('/students/{student}', [HomeController::class, 'update'])->name('students.update');
Route::delete('/students/destroy/{student}', [HomeController::class, 'destroy'])->name('students.destroy'); */

// Resource // CRUD Create Read Update Delete
Route::resource('students', StudentController::class);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('article_categories', ArticleCategoryController::class);
    Route::resource('articles', ArticleController::class);
});
