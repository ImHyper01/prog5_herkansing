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

Route::get('/create', [App\Http\Controllers\productController::class, 'create'])->name('create')->middleware('admin');
Route::post('/create', [App\Http\Controllers\productController::class, 'postCreate'])->name('createPost')->middleware('admin');

Route::get('/deleteProduct/{id}', [App\Http\Controllers\productController::class, 'deleteProduct'])->name('deleteProduct')->middleware('admin');

Route::get('/editProduct/{id}', [App\Http\Controllers\productController::class, 'editProduct'])->name('editProduct')->middleware('admin');
Route::post('/editProduct/{id}', [App\Http\Controllers\productController::class, 'postProduct'])->name('postProduct')->middleware('admin');

Route::get('/search', [App\Http\Controllers\productController::class, 'search'])->name('search');
Route::get('/filter', [App\Http\Controllers\productController::class, 'filter'])->name('filter');

Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin')->middleware('admin');

Route::put('/status', [App\Http\Controllers\adminController::class, 'status'])->name('admin.status')->middleware('admin');


Route::get('buy', [App\Http\Controllers\productController::class, 'buy'])->name('buy');
