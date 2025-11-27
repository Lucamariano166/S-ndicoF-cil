<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function() {
    return 'Laravel is working!';
});

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/contato', [LandingController::class, 'store'])->name('contato.store');

// Rota admin para ver leads (adicione autenticação depois)
Route::get('/admin/leads', [LandingController::class, 'leads'])->name('admin.leads');

// Webhook Mercado Pago (sem CSRF - webhooks externos)
Route::post('/webhooks/mercadopago', [\App\Http\Controllers\MercadoPagoWebhookController::class, 'handle'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
    ->name('webhooks.mercadopago');

// Rota alternativa na raiz (caso o Mercado Pago não aceite subpasta)
Route::post('/mercadopago', [\App\Http\Controllers\MercadoPagoWebhookController::class, 'handle'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
    ->name('webhooks.mercadopago.alt');

// Rota webhook/mp (rota já cadastrada no Mercado Pago)
Route::post('/webhook/mp', [\App\Http\Controllers\MercadoPagoWebhookController::class, 'handle'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
    ->name('webhooks.mercadopago.mp');
