<?php


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productCreate', [App\Http\Controllers\productController::class, 'index'])->name('products');

Route::get('/create', [App\Http\Controllers\productController::class, 'create'])->name('create');
Route::post('/create', [App\Http\Controllers\productController::class, 'postCreate'])->name('createPost');

Route::get('/deleteProduct/{id}', [App\Http\Controllers\productController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/editProduct/{id}', [App\Http\Controllers\productController::class, 'editProduct'])->name('editProduct');
Route::post('/editProduct/{id}', [App\Http\Controllers\productController::class, 'postProduct'])->name('postProduct');

Route::get('/search', [App\Http\Controllers\productController::class, 'search'])->name('search');
Route::get('/filter', [App\Http\Controllers\productController::class, 'filter'])->name('filter');

Route::get('buy', [App\Http\Controllers\productController::class, 'buy'])->name('buy');
