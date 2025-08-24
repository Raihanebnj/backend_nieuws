<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    NieuwsitemController,
    Admin\NieuwsitemController as AdminNieuwsitemController,
    Admin\UserController,
    Admin\AdminDashboardController,
    FaqCategorieController,
    FaqVraagController,
    ContactController,
    ProfileController,
    HomeController
};

// ---------------------------
// Publieke routes
// ---------------------------

// Homepagina
Route::get('/', [HomeController::class, 'index'])->name('home');

// Nieuwsitems (alleen lezen)
Route::prefix('nieuwsitems')->name('nieuwsitems.')->group(function () {
    Route::get('/', [NieuwsitemController::class, 'index'])->name('index');
    Route::get('/{nieuwsitem}', [NieuwsitemController::class, 'show'])->name('show');
});

// FAQ
Route::get('/faq', function () {
    $categorieen = \App\Models\FaqCategorie::with('vragen')->get();
    return view('faq.index', compact('categorieen'));
})->name('faq.index');

// Contactformulier
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'create'])->name('create');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

// Publiek profiel (alleen show)
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

// ---------------------------
// Auth routes (gebruiker)
// ---------------------------

Route::middleware('auth')->group(function () {
    // Profiel bewerken
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/', [ProfileController::class, 'update'])->name('update');
    });
});

// ---------------------------
// Admin routes (auth + admin)
// ---------------------------

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Nieuwsitems beheer (CRUD)
    Route::resource('nieuwsitems', AdminNieuwsitemController::class);

    // Gebruikersbeheer (CRUD)
    Route::resource('users', UserController::class);

    // FAQ beheer
    Route::resource('faq_categorieen', FaqCategorieController::class);
    Route::resource('faq_vragen', FaqVraagController::class);

    // Contactberichten beheer
    Route::get('/contactberichten', [ContactController::class, 'index'])->name('contactberichten.index');
});

// ---------------------------
// Auth routes (login, register, password reset)
// ---------------------------

require __DIR__ . '/auth.php';
