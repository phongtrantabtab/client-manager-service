<?php

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Invoker\TimeoutException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
            \App\Http\Middleware\LocaleMiddleware::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e) {
//            if (env('APP_ENV') == 'local') {
                Log::channel('exception')->error(
                    'Message: ' . $e->getMessage()
                    . ' File: ' . $e->getFile()
                    . ' Line: ' . $e->getLine()
                );
//            }
            if ($e instanceof BindingResolutionException) {
                Log::channel('fatal')->error(
                    'Message: ' . $e->getMessage()
                    . ' File: ' . $e->getFile()
                    . ' Line: ' . $e->getLine()
                );

                return redirect()->back()->withErrors($e->getMessage());
            }
            if ($e instanceof AccessDeniedHttpException) {
                if ($e->getPrevious() instanceof AuthorizationException) {
                    return redirect()
                        ->route('home')
                        ->withErrors($e->getMessage());
                }
            }
            if ($e instanceof NotFoundHttpException) {
                return redirect()->route('404');
            }
            if ($e instanceof TimeoutException) {
                return redirect()->route('timeout');
            }
            if (! $e instanceof ValidationException) {
                return redirect()
                    ->back()
                    ->withErrors($e->getMessage());
            } else {
                Session::flash('error', $e->getMessage());
            }
        });
        $exceptions->dontReportDuplicates();
    })->create();
