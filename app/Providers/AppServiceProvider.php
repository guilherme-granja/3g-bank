<?php

namespace App\Providers;

use App\Services\Contracts\CustomerAddressServiceContract;
use App\Services\Contracts\CustomerServiceContract;
use App\Services\Contracts\FileStorageServiceContract;
use App\Services\Contracts\KycDocumentFileServiceContract;
use App\Services\Contracts\KycDocumentServiceContract;
use App\Services\Contracts\KycDocumentTypeServiceContract;
use App\Services\Customer\CustomerService;
use App\Services\CustomerAddress\CustomerAddressService;
use App\Services\FileStorage\FileStorageService;
use App\Services\KycDocument\KycDocumentFileService;
use App\Services\KycDocument\KycDocumentService;
use App\Services\KycDocument\KycDocumentTypeService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CustomerServiceContract::class, CustomerService::class);
        $this->app->bind(CustomerAddressServiceContract::class, CustomerAddressService::class);
        $this->app->bind(KycDocumentTypeServiceContract::class, KycDocumentTypeService::class);
        $this->app->bind(KycDocumentServiceContract::class, KycDocumentService::class);
        $this->app->bind(KycDocumentFileServiceContract::class, KycDocumentFileService::class);
        $this->app->bind(FileStorageServiceContract::class, FileStorageService::class);
    }

    public function boot(): void
    {
        $this->configurePassport();
        $this->publicRoutesRateLimiter();
    }

    private function configurePassport(): void
    {
        Passport::tokensCan([
            // Customer scopes
            'accounts.read' => 'Read customer accounts',
            'transactions.read' => 'Read transactions',
            'transactions.create' => 'Create transactions',
            'cards.read' => 'Read cards',
            'profile.read' => 'Read own profile',

            // Staff / internal scopes
            'customers.read' => 'Read customers',
            'customers.update' => 'Update customers',
            'compliance.review' => 'Review compliance cases',
            'audit.read',
        ]);

        Passport::tokensExpireIn(now()->addMinutes(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }

    private function publicRoutesRateLimiter(): void
    {
        RateLimiter::for(
            name: 'public-route',
            callback: fn (Request $request) => Limit::perMinute(10)->by("{$request->ip()}|{$request->userAgent()}")
        );
    }
}
