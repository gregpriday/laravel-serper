<?php

namespace GregPriday\LaravelSerper;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SerperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-serper')
            ->hasConfigFile();
    }

    public function packageBooted()
    {
        $this->app->singleton(Serper::class, function () {
            return new Serper(config('serper.key'));
        });
    }
}
