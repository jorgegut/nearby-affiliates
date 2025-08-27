<?php

namespace App\Providers;

use App\Contracts\AffiliatesParserInterface;
use App\Contracts\AffiliatesServiceInterface;
use App\Contracts\DistanceCalculatorInterface;
use App\Services\AffiliatesService;
use App\Services\DistanceCalculator;
use App\Services\FileParser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AffiliatesServiceInterface::class, AffiliatesService::class);
        $this->app->bind(AffiliatesParserInterface::class, FileParser::class);
        $this->app->bind(DistanceCalculatorInterface::class, DistanceCalculator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
