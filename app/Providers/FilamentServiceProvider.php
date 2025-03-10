<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;
use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Js;
use Filament\Support\Assets\Css;
use Filament\Panel;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /*$host = Request::getHost();
        $subdomain = explode('.', $host)[0];

        $this->app->instance('tenant.subdomain', $subdomain);

        Filament::serving(function () use ($subdomain) {
            Filament::registerRenderHook(
                'panels::global-search.before',
                fn(): string => '<img src="' . $this->getTenantLogo($subdomain) . '" alt="Logo" class="h-10" />'
            );
        });*/
    }

    protected function getTenantLogo(string $subdomain): string
    {
        // Check if the tenant-specific logo exists
        $logoPath = "images/tenants/{$subdomain}/logo.svg";
        $defaultLogo = "images/default-logo.png";

        if (file_exists(public_path($logoPath))) {
            return asset($logoPath);
        }

        return asset($defaultLogo);
    }
}
