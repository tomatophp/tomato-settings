<?php

namespace TomatoPHP\TomatoSettings;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use ProtoneMedia\Splade\Facades\SEO;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;
use TomatoPHP\TomatoRoles\Services\Permission;
use TomatoPHP\TomatoRoles\Services\TomatoRoles;
use TomatoPHP\TomatoSettings\Console\TomatoSettingGenerator;
use TomatoPHP\TomatoSettings\Console\TomatoSettingInstall;
use TomatoPHP\TomatoSettings\Menus\SettingsMenu;

class TomatoSettingsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-settings.php', 'tomato-settings');

        //Register Menus for Tomato Roles
        TomatoMenuRegister::registerMenu(SettingsMenu::class);

        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-settings');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-settings');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        //Publish Views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-settings'),
        ], 'tomato-settings-views');

        //Publish Config
        $this->publishes([
            __DIR__.'/../config/tomato-settings.php' => config_path('tomato-settings.php'),
        ], 'tomato-settings-config');

        //Publish Lang
        $this->publishes([
            __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-settings'),
        ], 'tomato-settings-lang');

        //Publish Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-settings-migrations');

        //Register generate command
        $this->commands([
            TomatoSettingInstall::class,
            TomatoSettingGenerator::class,
        ]);

        //Register new blade component
        $this->loadViewComponentsAs('tomato-settings', [
            \TomatoPHP\TomatoSettings\Views\Card::class,
        ]);

        $this->registerPermissions();

    }

    public function boot(): void
    {
        $this->registerSettingsConfigPass();
    }

    /**
     * @return void
     */
    public function registerPermissions(): void
    {
        //Register Permission For Settings
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.site.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.site.store')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.email.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.email.store')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.google.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.google.store')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.services.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.services.store')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.themes.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.themes.store')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.payments.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.payments.store')
            ->guard('web')
            ->group('settings')
        );
    }

    public function registerSettingsConfigPass(): void
    {
        try {
            Config::set('mail.mailers.smtp', [
                'transport' => setting('mail_mailer'),
                'host' => setting('mail_host'),
                'port' => setting('mail_port'),
                'encryption' => setting('mail_encryption'),
                'username' => setting('mail_username'),
                'password' => setting('mail_password'),
                'timeout' => null,
                'auth_mode' => null,
            ]);

            Config::set('mail.from', [
                'address' => setting('mail_from_address'),
                'name' => setting('mail_from_name'),
            ]);

        }
        catch (\Exception $e){
            \Log::error($e);
        }
    }
}
