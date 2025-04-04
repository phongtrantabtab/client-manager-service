<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use App\Core\Database\QueryDebugger;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $pathRepository = glob(app_path('/Repositories').'/*.php');

        foreach ($pathRepository as $path) {
            $arrPath = explode('/', $path);
            $fileNameRepository = end($arrPath);
            if ($fileNameRepository == 'BaseRepository.php') {
                continue;
            }
            $repoName = preg_replace('/.php$/', '', $fileNameRepository);
            $this->app->singleton(
                "App\Contracts\Repositories\\{$repoName}Interface",
                "App\Repositories\\{$repoName}"
            );
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        QueryDebugger::setup();
    }
}
