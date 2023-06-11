<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\StripeController;
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

// about 
Route::get('/about', function () {
    return view('about');
})->name('about');

// contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('contact.store');

// checkout
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('checkout.success');

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
        Route::post('/admin/articles/{article}', [ArticleController::class, 'publish'])->name('admin.article.publish');
        Route::get('/admin/articles/{article}', [ArticleController::class, 'preview'])->name('admin.article');
        Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::put('/admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.article.update');
        Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

        // admin formations
        Route::get('/admin/formations', [FormationController::class, 'admin'])->name('admin.formations');
        Route::get('/admin/formations/create', [FormationController::class, 'create'])->name('admin.formation.create');
        Route::post('/admin/formations', [FormationController::class, 'store'])->name('admin.formation.store');
        Route::post('/admin/formations/{formation}', [FormationController::class, 'publish'])->name('admin.formation.publish');
        Route::get('/admin/formations/{formation}', [FormationController::class, 'preview'])->name('admin.formation');
        Route::get('/admin/formations/{formation}/edit', [FormationController::class, 'edit'])->name('admin.formation.edit');
        Route::put('/admin/formations/{formation}', [FormationController::class, 'update'])->name('admin.formation.update');
        Route::delete('/admin/formations/{formation}', [FormationController::class, 'destroy'])->name('admin.formation.destroy');
        // admin formations chapters
        Route::get('/admin/formations/{formation}/chapters/create', [ChapterController::class, 'create'])->name('admin.formation.chapter.create');
        Route::post('/admin/formations/{formation}/chapters', [ChapterController::class, 'store'])->name('admin.formation.chapter.store');
        Route::get('/admin/formations/{formation}/chapters/{chapter}/edit', [ChapterController::class, 'edit'])->name('admin.formation.chapter.edit');
        Route::put('/admin/formations/{formation}/chapters/{chapter}', [ChapterController::class, 'update'])->name('admin.formation.chapter.update');
        Route::delete('/admin/formations/{formation}/chapters/{chapter}', [ChapterController::class, 'destroy'])->name('admin.formation.chapter.destroy');
        
        // admin users
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.user');
        
    });

});

Route::get('/conditions-générales-d\'utilisation', function () {
    return view('termsUse');
})->name('terms.use.show');

Route::get('/conditions-générales-de-vente', function () {
    return view('termsSale');
})->name('terms.sale.show');

Route::get('/mentions-légales', function () {
    return view('legalInfo');
})->name('legal.notice.show');

Route::get('/politique-de-confidentialité', function () {
    return view('policy');
})->name('privacy.policy.show');

Route::get('/politique-de-cookies', function () {
    return view('cookie');
})->name('cookies.policy.show');