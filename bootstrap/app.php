<?php

use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CheckIsAssistant;
use App\Http\Middleware\CheckIsOfficeAdmin;
use App\Http\Middleware\CheckIsPsychologist;
use App\Http\Middleware\CheckUserType;
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
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
