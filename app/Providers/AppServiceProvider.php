<?php

namespace App\Providers;

use App\Services\Contracts\CustomerServiceContract;
use App\Services\Customer\CustomerService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerServiceContract::class, CustomerService::class);
    }

    /**
     * Bootstrap any application services.
     */
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
