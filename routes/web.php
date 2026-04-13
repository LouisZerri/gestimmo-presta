<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdvisorController,
    ArticleController,
    ContactController,
    EdlController,
    EstimationController,
    FaqController,
    HomeController,
    InsuranceController,
    InvestController,
    JoinController,
    ManageController,
    ProController,
    RentalController,
    SellController,
    ChatbotController
};
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AIController as AdminAIController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\EdlyaController as AdminEdlyaController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;

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
    // Page investissement principale (ancien)
    Route::get('/', [InvestController::class, 'index'])->name('invest');
    Route::post('/', [InvestController::class, 'submit'])->name('invest.submit');
    // Immobilier neuf
    Route::get('/neuf', fn () => view('invest.neuf'))->name('invest.neuf');
    Route::post('/neuf', [\App\Http\Controllers\InvestNeufController::class, 'submit'])->name('invest.neuf.submit');
    // Viager
    Route::get('/viager', fn () => view('invest.viager'))->name('invest.viager');
    Route::post('/viager', [\App\Http\Controllers\InvestViagerController::class, 'submit'])->name('invest.viager.submit');
});

/**
 * Section Vente
 */
Route::get('/vendre', [SellController::class, 'index'])->name('sell');
Route::post('/vendre', [SellController::class, 'submit'])->name('sell.submit');

/**
 * FAQ (Foire aux questions)
 */
Route::get('/aide', [FaqController::class, 'index'])->name('faq');

/**
 * Section Gestion (location, syndic)
 */
Route::prefix('gerer')->group(function () {
    // Page de gestion principale (syndic + gestion locative)
    Route::get('/', [ManageController::class, 'index'])->name('manage');
    Route::post('/contact', [ManageController::class, 'submit'])->name('manage.submit');
});

/**
 * Gestion Locative (3 offres)
 */
Route::prefix('gestion-locative')->group(function () {
    Route::get('/', [RentalController::class, 'index'])->name('rental');
    Route::get('/complete', [RentalController::class, 'complete'])->name('rental.complete');
    Route::get('/technique', [RentalController::class, 'technical'])->name('rental.technical');
    Route::get('/a-la-carte', [RentalController::class, 'alacarte'])->name('rental.alacarte');
});

/**
 * État des Lieux
 */
Route::get('/etat-des-lieux', [EdlController::class, 'index'])->name('edl');
Route::post('/etat-des-lieux', [EdlController::class, 'submit'])->name('edl.submit');

/**
 * Section PRO
 */
Route::prefix('pro')->group(function () {
    Route::get('/etat-des-lieux', [ProController::class, 'edl'])->name('pro.edl');
    Route::get('/nourrice-locative', [ProController::class, 'nourrice'])->name('pro.nourrice');
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
 * Demande de tarifs (modale AJAX)
 */
Route::post('/tarifs', [\App\Http\Controllers\TarifsController::class, 'submit'])->name('tarifs.submit');

/**
 * Sitemap
 */
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

/**
 * Chatbot IA
 */
Route::post('/chatbot', [ChatbotController::class, 'chat'])->name('chatbot');

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
        Route::post('/articles/bulk', [AdminArticleController::class, 'bulkAction'])->name('articles.bulk');
        Route::post('/upload-image', [AdminArticleController::class, 'uploadImage'])->name('upload.image');
        Route::post('/articles/generate-image', [AdminArticleController::class, 'generateImage'])->name('articles.generate-image');

        // Génération IA
        Route::get('/articles/ai/generate', [AdminAIController::class, 'create'])->name('articles.ai.create');
        Route::post('/articles/ai/generate', [AdminAIController::class, 'generate'])->name('articles.ai.generate');

        // Avis clients
        Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
        Route::post('/testimonials/{testimonial}/reformulate', [AdminTestimonialController::class, 'reformulate'])->name('testimonials.reformulate');

        // Edlya - Codes d'activation
        Route::get('/edlya', [AdminEdlyaController::class, 'index'])->name('edlya.index');
        Route::post('/edlya/create-code', [AdminEdlyaController::class, 'createCode'])->name('edlya.create-code');

        // Leads (landing pages)
        Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
        Route::patch('/leads/{lead}/statut', [AdminLeadController::class, 'updateStatut'])->name('leads.statut');
        Route::get('/leads-export', [AdminLeadController::class, 'export'])->middleware('throttle:3,1')->name('leads.export');

        // Rappels chatbot
        Route::get('/callbacks', [AdminLeadController::class, 'callbacks'])->name('callbacks.index');
        Route::patch('/callbacks/{callbackRequest}/statut', [AdminLeadController::class, 'updateCallbackStatut'])->name('callbacks.statut');
    });
});
