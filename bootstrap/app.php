<?php

use App\Http\Middleware\PemilikModel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\PemilikTools;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'pemilik-tools' => \App\Http\Middleware\PemilikTools::class,
            'Pemilik-Model' => \App\Http\Middleware\PemilikModel::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
