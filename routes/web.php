<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController as Category;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('category')->name('c_')->group(function () {
    Route::get('/', [Category::class, 'index'])->name('index');
    Route::get('/create', [Category::class, 'create'])->name('create');
    Route::post('/create', [Category::class, 'store'])->name('store');
    Route::get('/show/{category}', [Category::class, 'show'])->name('show');
    Route::delete('/delete/{category}', [Category::class, 'destroy'])->name('delete');
    Route::get('/edit/{category}', [Category::class, 'edit'])->name('edit');
    Route::put('/edit/{category}', [Category::class, 'update'])->name('update');
    Route::delete('/delete-books/{category}', [Category::class, 'destroyAll'])->name('delete_books');
});