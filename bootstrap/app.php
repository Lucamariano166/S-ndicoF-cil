<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Redireciona para home em caso de erro 419 (CSRF token expirado)
        $exceptions->respond(function (\Illuminate\Http\Response $response) {
            if ($response->getStatusCode() === 419) {
                return redirect()->route('home')->with('error', 'Sua sessão expirou. Por favor, tente novamente.');
            }

            return $response;
        });
    })->create();
