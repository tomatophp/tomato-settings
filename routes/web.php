<?php


use TomatoPHP\TomatoRoles\Http\Middleware\Can;
use TomatoPHP\TomatoSettings\Http\Controllers\SiteSettingsController;

Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/site', [SiteSettingsController::class, 'index'])->name('settings.site.index');
    Route::post('/settings/site', [SiteSettingsController::class, 'store'])->name('settings.site.store');
});

Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/email', [\TomatoPHP\TomatoSettings\Http\Controllers\EmailSettingsController::class, 'index'])->name('settings.email.index');
    Route::post('/settings/email', [\TomatoPHP\TomatoSettings\Http\Controllers\EmailSettingsController::class, 'store'])->name('settings.email.store');
});

Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/google', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleSettingsController::class, 'index'])->name('settings.google.index');
    Route::post('/settings/google', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleSettingsController::class, 'store'])->name('settings.google.store');
});

Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/services', [\TomatoPHP\TomatoSettings\Http\Controllers\ServicesSettingsController::class, 'index'])->name('settings.services.index');
    Route::post('/settings/services', [\TomatoPHP\TomatoSettings\Http\Controllers\ServicesSettingsController::class, 'store'])->name('settings.services.store');
});

Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/payments', [\TomatoPHP\TomatoSettings\Http\Controllers\PaymentsSettingsController::class, 'index'])->name('settings.payments.index');
    Route::post('/settings/payments', [\TomatoPHP\TomatoSettings\Http\Controllers\PaymentsSettingsController::class, 'store'])->name('settings.payments.store');
});
//TODO: Theme setting for frontend actions with Builder package
//Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
//    Route::get('/settings/themes', [\TomatoPHP\TomatoSettings\Http\Controllers\ThemesSettingsController::class, 'index'])->name('settings.themes.index');
//    Route::post('/settings/themes', [\TomatoPHP\TomatoSettings\Http\Controllers\ThemesSettingsController::class, 'store'])->name('settings.themes.store');
//});

