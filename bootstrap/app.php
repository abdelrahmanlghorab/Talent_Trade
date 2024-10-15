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
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdminMiddleware::class,
            'is_employee' => \App\Http\Middleware\IsEmployeeMiddleware::class,
            'is_candidate' => \App\Http\Middleware\IsCandidateMiddleware::class,
            'Create_Without_Role' => \App\Http\Middleware\RegisterWithoutRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();