<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

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
            'customers.read'      => 'Read customers',
            'customers.update'    => 'Update customers',
            'compliance.review'   => 'Review compliance cases',
            'audit.read'
        ]);

        Passport::tokensExpireIn(now()->addMinutes(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
