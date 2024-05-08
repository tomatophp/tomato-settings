<?php


use TomatoPHP\TomatoRoles\Http\Middleware\Can;
use TomatoPHP\TomatoSettings\Http\Controllers\SettingsController;
use TomatoPHP\TomatoSettings\Http\Controllers\SiteSettingsController;

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
});


Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/local', [\TomatoPHP\TomatoSettings\Http\Controllers\LocalSettingsController::class, 'index'])->name('settings.local.index');
    Route::post('/settings/local', [\TomatoPHP\TomatoSettings\Http\Controllers\LocalSettingsController::class, 'store'])->name('settings.local.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/services/facebook', [\TomatoPHP\TomatoSettings\Http\Controllers\FacebookServicesSettingsController::class, 'index'])->name('settings.services-facebook.index');
    Route::post('/settings/services/facebook', [\TomatoPHP\TomatoSettings\Http\Controllers\FacebookServicesSettingsController::class, 'store'])->name('settings.services-facebook.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/services/addthis', [\TomatoPHP\TomatoSettings\Http\Controllers\AddThisServicesSettingsController::class, 'index'])->name('settings.services-addthis.index');
    Route::post('/settings/services/addthis', [\TomatoPHP\TomatoSettings\Http\Controllers\AddThisServicesSettingsController::class, 'store'])->name('settings.services-addthis.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/services/sms', [\TomatoPHP\TomatoSettings\Http\Controllers\SMSServicesSettingsController::class, 'index'])->name('settings.services-sms.index');
    Route::post('/settings/services/sms', [\TomatoPHP\TomatoSettings\Http\Controllers\SMSServicesSettingsController::class, 'store'])->name('settings.services-sms.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/services/shipping', [\TomatoPHP\TomatoSettings\Http\Controllers\ShippingServicesSettingsController::class, 'index'])->name('settings.services-shipping.index');
    Route::post('/settings/services/shipping', [\TomatoPHP\TomatoSettings\Http\Controllers\ShippingServicesSettingsController::class, 'store'])->name('settings.services-shipping.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/google/recap', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleRecapSettingsController::class, 'index'])->name('settings.google-recap.index');
    Route::post('/settings/google/recap', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleRecapSettingsController::class, 'store'])->name('settings.google-recap.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/google/firebase', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleFirebaseSettingsController::class, 'index'])->name('settings.google-firebase.index');
    Route::post('/settings/google/firebase', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleFirebaseSettingsController::class, 'store'])->name('settings.google-firebase.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/seo', [\TomatoPHP\TomatoSettings\Http\Controllers\SEOSettingsController::class, 'index'])->name('settings.seo.index');
    Route::post('/settings/seo', [\TomatoPHP\TomatoSettings\Http\Controllers\SEOSettingsController::class, 'store'])->name('settings.seo.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/site', [SiteSettingsController::class, 'index'])->name('settings.site.index');
    Route::post('/settings/site', [SiteSettingsController::class, 'store'])->name('settings.site.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/email', [\TomatoPHP\TomatoSettings\Http\Controllers\EmailSettingsController::class, 'index'])->name('settings.email.index');
    Route::post('/settings/email', [\TomatoPHP\TomatoSettings\Http\Controllers\EmailSettingsController::class, 'store'])->name('settings.email.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/google', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleSettingsController::class, 'index'])->name('settings.google.index');
    Route::post('/settings/google', [\TomatoPHP\TomatoSettings\Http\Controllers\GoogleSettingsController::class, 'store'])->name('settings.google.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/services', [\TomatoPHP\TomatoSettings\Http\Controllers\ServicesSettingsController::class, 'index'])->name('settings.services.index');
    Route::post('/settings/services', [\TomatoPHP\TomatoSettings\Http\Controllers\ServicesSettingsController::class, 'store'])->name('settings.services.store');
});

Route::middleware(array_merge(['splade', 'auth'], config('tomato-admin.route_middlewares')))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/payments', [\TomatoPHP\TomatoSettings\Http\Controllers\PaymentsSettingsController::class, 'index'])->name('settings.payments.index');
    Route::post('/settings/payments', [\TomatoPHP\TomatoSettings\Http\Controllers\PaymentsSettingsController::class, 'store'])->name('settings.payments.store');
});
