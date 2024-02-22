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

Route::get('/main',[\App\Http\Controllers\PostController::class, 'index']);
Route::prefix('/admin')->group(function(){
    Route::get('/',\App\Http\Controllers\Admin\IndexController::class)->name('admin.index');

    Route::prefix('/categories')->group(function(){
        Route::get('/',[\App\Http\Controllers\Admin\Categories\CategoriesController::class, 'index'] )->name('admin.categories.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Categories\CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [\App\Http\Controllers\Admin\Categories\CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{category}', [\App\Http\Controllers\Admin\Categories\CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/update/{category}', [\App\Http\Controllers\Admin\Categories\CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::delete('/delete/{category}', [\App\Http\Controllers\Admin\Categories\CategoriesController::class, 'destroy'])->name('admin.categories.delete');

    });
    Route::prefix('/posts')->group(function(){
        Route::get('/',[\App\Http\Controllers\Admin\PostController::class, 'index'] )->name('admin.posts.index');
        Route::get('/{post}/show',[\App\Http\Controllers\Admin\PostController::class, 'show'] )->name('admin.posts.show');
        Route::get('/create',[\App\Http\Controllers\Admin\PostController::class, 'create'] )->name('admin.posts.create');
        Route::post('/store',[\App\Http\Controllers\Admin\PostController::class, 'store'] )->name('admin.posts.store');
        Route::get('/edit/{post}',[\App\Http\Controllers\Admin\PostController::class, 'edit'] )->name('admin.posts.edit');
        Route::patch('/update/{post}',[\App\Http\Controllers\Admin\PostController::class, 'update'] )->name('admin.posts.update');
    });
    Route::prefix('/tags')->group(function(){
        Route::get('/',[\App\Http\Controllers\Admin\TagController::class, 'index'] )->name('admin.tags.index');
        Route::get('/create',[\App\Http\Controllers\Admin\TagController::class, 'create'] )->name('admin.tags.create');
        Route::post('/store',[\App\Http\Controllers\Admin\TagController::class, 'store'] )->name('admin.tags.store');
        Route::get('/{tag}/edit',[\App\Http\Controllers\Admin\TagController::class, 'edit'] )->name('admin.tags.edit');
        Route::patch('/{tag}/update',[\App\Http\Controllers\Admin\TagController::class, 'update'] )->name('admin.tags.update');
        Route::delete('/{tag}/delete',[\App\Http\Controllers\Admin\TagController::class, 'destroy'] )->name('admin.tags.delete');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
