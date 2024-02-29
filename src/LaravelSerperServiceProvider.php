<?php

namespace GregPriday\LaravelSerper;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use GregPriday\LaravelSerper\Commands\LaravelSerperCommand;

class LaravelSerperServiceProvider extends PackageServiceProvider
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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-serper_table')
            ->hasCommand(LaravelSerperCommand::class);
    }
}
