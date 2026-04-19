<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Popupcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/',          [HomeController::class, 'index'])->name('home');
Route::get('/about',     [AboutController::class, 'index'])->name('about');
Route::get('/services',  [ServicesController::class, 'index'])->name('services');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact',   [ContactController::class, 'index'])->name('contact');
Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');

Route::post('/tickets',  [TicketController::class, 'store'])->name('tickets.store');

Route::get('/api/popup', [Popupcontroller::class, 'getActivePopup']);
