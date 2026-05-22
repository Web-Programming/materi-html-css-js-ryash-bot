<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 1. Gate untuk mengecek apakah user adalah admin secara umum
        Gate::define('manage-products', function (User $user) {
            return $user->role === 'admin';
        });

        // 2. Gate untuk membuat product (Bisa diakses oleh sales atau sesuai kebutuhan)
        Gate::define('create-product', function (User $user) {
            return $user->role === 'sales' || $user->role === 'admin';
        });

        // 3. Gate untuk update product (Bisa admin atau sales)
        Gate::define('update-product', function (User $user, Product $product) {
            return $user->role === 'admin' || $user->role === 'sales';
        });

        // 4. Gate untuk delete product (Hanya admin)
        Gate::define('delete-product', function (User $user, Product $product) {
            return $user->role === 'admin';
        });
    }
}