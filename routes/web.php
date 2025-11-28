<?php

use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\InvestController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/investir', [InvestController::class, 'index'])->name('invest');
Route::post('/investir', [InvestController::class, 'submit'])->name('invest.submit');

Route::get('/vendre', [SellController::class, 'index'])->name('sell');

Route::get('/aide', [FaqController::class, 'index'])->name('faq');

// Gestion locative & Syndic
Route::get('/gerer', [ManageController::class, 'index'])->name('manage');
Route::post('/gerer/contact', [App\Http\Controllers\ManageController::class, 'submit'])->name('manage.submit');

Route::get('/assurances', [InsuranceController::class, 'index'])->name('insurance');
Route::post('/assurances', [App\Http\Controllers\InsuranceController::class, 'submit'])->name('insurance.submit');

Route::get('/conseillers', [AdvisorController::class, 'index'])->name('advisors');
Route::post('/conseillers', [AdvisorController::class, 'submit'])->name('advisors.submit');

Route::get('/rejoindre', [JoinController::class, 'index'])->name('join');
Route::post('/rejoindre', [App\Http\Controllers\JoinController::class, 'submit'])->name('join.submit');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Estimation
Route::get('/estimer', [EstimationController::class, 'index'])->name('estimation');
Route::post('/estimer', [EstimationController::class, 'submit'])->name('estimation.submit');
Route::view('/estimer/confirmation', 'estimation-success')->name('estimation.success');

// Articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Pages statiques
Route::view('/cookies', 'pages.cookies')->name('cookies');
Route::view('/mentions-legales', 'pages.legal')->name('legal');
Route::view('/confidentialite', 'pages.privacy')->name('privacy');
Route::view('/bareme-honoraires', 'pages.fees')->name('fees');


