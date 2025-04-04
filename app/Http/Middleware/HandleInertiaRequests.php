<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => array_filter([
                'success' => $request->session()->get('success') ?? null,
                'error' => $request->session()->get('error') ?? null,
                'warning' => $request->session()->get('warning') ?? null,
                'info' => $request->session()->get('info') ?? null,
            ]),
            'locale' => function () {
                if (session()->has('locale')) {
                    app()->setLocale(session('locale'));
                }

                return app()->getLocale();
            },
        ];
    }
}
