<?php

namespace App\Providers;

use App\Geocoder\GeocoderInterface;
use App\Geocoder\NitraDistrictCityGeocoder;
use App\Jobs\ParseNitraDistrictCities;
use App\Parser\NitraDistrictCityParser;
use App\Parser\NitraSubDistrictsCitiesParser;
use App\Parser\ParserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ParserInterface::class, NitraDistrictCityParser::class);
        $this->app->bind(GeocoderInterface::class, NitraDistrictCityGeocoder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bindMethod([ParseNitraDistrictCities::class, 'handle'], function (ParseNitraDistrictCities $job, Application $app) {
            $job->handle($app->make(NitraSubDistrictsCitiesParser::class));
        });
    }
}
