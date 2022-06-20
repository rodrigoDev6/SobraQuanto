<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Observers\OrdemDeServicoServicoObserver;
use App\Models\User;
use App\Models\OrdemDeServicoServico;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Gate::define('is_admin', function (User $user) {
            return $user->perfil === 'admin';
        });

        Gate::define('is_padrao', function (User $user) {
            return $user->perfil === 'padrao';
        });

        OrdemDeServicoServico::observe(OrdemDeServicoServicoObserver::class);
    }
}
