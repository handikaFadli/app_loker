<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        'App\Models\Lamaran' => 'App\Policies\LamaranPolicy',
        // 'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Pelamar' => 'App\Policies\PelamarPolicy',
        'App\Models\Perusahaan' => 'App\Policies\PerusahaanPolicy',
        'App\Models\Lowongan' => 'App\Policies\LowonganPolicy',
        'App\Models\User' => 'App\Policies\ProfilPolicy',
        // 'App\Models\Perusahaan' => 'App\Policies\KontakPolicy',
        // 'App\Models\Perusahaan' => 'App\Policies\TentangPolicy',
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('kaprodi', function (User $user) {
            return $user->role == 'kaprodi';
        });

        Gate::define('dekan', function (User $user) {
            return $user->role == 'dekan';
        });

        Gate::define('pelamar', function (User $user) {
            return $user->role == 'pelamar';
        });
    }
}
