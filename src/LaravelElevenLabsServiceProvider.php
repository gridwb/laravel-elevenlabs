<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs;

use Gridwb\LaravelElevenLabs\Contracts\ApiClientContract;
use Gridwb\LaravelElevenLabs\Contracts\ClientContract;
use Illuminate\Support\Facades\Config;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelElevenLabsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-elevenlabs')
            ->hasConfigFile('elevenlabs')
            ->hasRoute('elevenlabs');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(ApiClientContract::class, function (): ApiClient {
            /** @var string $apiUrl */
            $apiUrl = Config::get('elevenlabs.api_url');
            /** @var string $apiKey */
            $apiKey = Config::get('elevenlabs.api_key');

            return new ApiClient($apiUrl, $apiKey);
        });

        $this->app->singleton(ClientContract::class, Client::class);
        $this->app->alias(ClientContract::class, 'elevenlabs');
    }
}
