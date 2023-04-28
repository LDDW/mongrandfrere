<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// index
Route::get('/', function () {
    return view('index');
})->name('index');

// articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article');

// formations
Route::get('/formations', [FormationController::class, 'index'])->name('formations');
Route::get('/formations/{formation}', [FormationController::class, 'show'])->name('formation');

// auth routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // admin routes
    Route::middleware(['admin'])->group(function() {

        // admin dashboard
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // admin articles
        Route::get('/admin/articles', [ArticleController::class, 'admin'])->name('admin.articles');
        Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/admin/articles/{article}', [ArticleController::class, 'preview'])->name('admin.article');
        Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

        // admin formations
        Route::get('/admin/formations', [FormationController::class, 'admin'])->name('admin.formations');

        // admin users
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.user');
        
    });

});