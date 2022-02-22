<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('index');
})->name('index');

Route::get('/categorias', [CategoryController::class, 'index'])->name('categories');

Route::get('/categorias/novo', [CategoryController::class, 'create'])->name('category.create');

Route::post('/categorias', [CategoryController::class, 'store']);

Route::get('/categorias/editar/{id}', [CategoryController::class, 'edit'])->name('category.edit');

Route::post('/categorias/editar/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/categorias/deletar/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/produtos', [ProductController::class, 'index'])->name('products');

Route::get('/produto/novo', [ProductController::class, 'create'])->name('product.create');

Route::post('/produtos', [ProductController::class, 'store']);

Route::get('/produtos/editar/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::post('/produtos/editar/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/produtos/deletar/{id}', [ProductController::class, 'destroy'])->name('product.delete');
