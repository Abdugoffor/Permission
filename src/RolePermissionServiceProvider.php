<?php

namespace Kadirov\RolePermission;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Migratsiyalarni yuklash
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // Konfiguratsiya faylini nashr qilish
        $this->publishes([
            __DIR__.'/../config/role_permission.php' => config_path('role_permission.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Konfiguratsiya faylini ro'yxatdan o'tkazish
        $this->mergeConfigFrom(
            __DIR__.'/../config/role_permission.php', 'role_permission'
        );
    }
}
