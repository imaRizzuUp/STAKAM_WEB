<?php

namespace App\Providers;

use App\models\Pendaftar;
use App\Observers\PendaftarObserver;
use Illuminate\Support\ServiceProvider;

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
        Pendaftar::observe(PendaftarObserver::class);
    }
}
