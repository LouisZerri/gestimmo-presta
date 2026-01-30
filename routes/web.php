<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdvisorController,
    ArticleController,
    ContactController,
    EstimationController,
    FaqController,
    HomeController,
    InsuranceController,
    InvestController,
    JoinController,
    ManageController,
    SellController
};
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AIController as AdminAIController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Ici sont définies toutes les routes web de l’application.
| Chaque route est commentée pour clarifier son usage.
*/

/**
 * Accueil
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Section Investissement
 */
Route::prefix('investir')->group(function () {
    // Affiche le formulaire d'investissement
    Route::get('/', [InvestController::class, 'index'])->name('invest');
    // Traite la soumission du formulaire d'investissement
    Route::post('/', [InvestController::class, 'submit'])->name('invest.submit');
});

/**
 * Section Vente
 */
Route::get('/vendre', [SellController::class, 'index'])->name('sell');

/**
 * FAQ (Foire aux questions)
 */
Route::get('/aide', [FaqController::class, 'index'])->name('faq');

/**
 * Section Gestion (location, etc.)
 */
Route::prefix('gerer')->group(function () {
    // Page de gestion
    Route::get('/', [ManageController::class, 'index'])->name('manage');
    // Soumission du formulaire de contact gestion
    Route::post('/contact', [ManageController::class, 'submit'])->name('manage.submit');
});

/**
 * Section Assurances
 */
Route::prefix('assurances')->group(function () {
    // Page assurance
    Route::get('/', [InsuranceController::class, 'index'])->name('insurance');
    // Soumission du formulaire d'assurance
    Route::post('/', [InsuranceController::class, 'submit'])->name('insurance.submit');
});

/**
 * Section Conseillers
 */
Route::prefix('conseillers')->group(function () {
    // Liste des conseillers
    Route::get('/', [AdvisorController::class, 'index'])->name('advisors');
    // Contact conseiller
    Route::post('/', [AdvisorController::class, 'submit'])->name('advisors.submit');
});

/**
 * Section Rejoindre
 */
Route::prefix('rejoindre')->group(function () {
    // Page rejoindre
    Route::get('/', [JoinController::class, 'index'])->name('join');
    // Soumission du formulaire rejoindre
    Route::post('/', [JoinController::class, 'submit'])->name('join.submit');
});

/**
 * Contact
 */
Route::prefix('contact')->group(function () {
    // Page contact
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    // Soumission du formulaire contact
    Route::post('/', [ContactController::class, 'submit'])->name('contact.submit');
});

/**
 * Estimation bien immobilier
 */
Route::prefix('estimer')->group(function () {
    // Formulaire d'estimation
    Route::get('/', [EstimationController::class, 'index'])->name('estimation');
    // Traitement du formulaire d'estimation
    Route::post('/', [EstimationController::class, 'submit'])->name('estimation.submit');
    // Page de confirmation d'estimation
    Route::view('/confirmation', 'estimation-success')->name('estimation.success');
});

/**
 * Articles de blog/actualités
 */
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('articles.show');

/**
 * Pages statiques légales et informations
 */
Route::view('/cookies', 'pages.cookies')->name('cookies'); // Politique cookies
Route::view('/mentions-legales', 'pages.legal')->name('legal'); // Mentions légales
Route::view('/confidentialite', 'pages.privacy')->name('privacy'); // Politique de confidentialité
Route::view('/bareme-honoraires', 'pages.fees')->name('fees'); // Barème des honoraires

/**
 * Administration
 */
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth (sans middleware)
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Routes protégées
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('articles', AdminArticleController::class)->except(['show']);
        Route::post('/upload-image', [AdminArticleController::class, 'uploadImage'])->name('upload.image');

        // Génération IA
        Route::get('/articles/ai/generate', [AdminAIController::class, 'create'])->name('articles.ai.create');
        Route::post('/articles/ai/generate', [AdminAIController::class, 'generate'])->name('articles.ai.generate');
    });
});
