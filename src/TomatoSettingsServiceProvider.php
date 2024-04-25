<?php

namespace TomatoPHP\TomatoSettings;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use ProtoneMedia\Splade\Facades\SEO;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
use TomatoPHP\TomatoRoles\Services\Permission;
use TomatoPHP\TomatoRoles\Services\TomatoRoles;
use TomatoPHP\TomatoSettings\Console\TomatoSettingGenerator;
use TomatoPHP\TomatoSettings\Console\TomatoSettingInstall;
use TomatoPHP\TomatoSettings\Facades\TomatoSettings;
use TomatoPHP\TomatoSettings\Menus\SettingsMenu;
use TomatoPHP\TomatoSettings\Services\Contracts\SettingHold;
use TomatoPHP\TomatoSettings\Services\SettingHolderHandler;

class TomatoSettingsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-settings.php', 'tomato-settings');

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

        app()->bind('tomato-settings', function () {
            return new SettingHolderHandler();
        });

    }

    public function boot(): void
    {
        $this->registerSettingsConfigPass();


        TomatoMenu::register([
            Menu::make()
                ->group(__('Settings'))
                ->label(__('Settings'))
                ->icon("bx bxs-cog")
                ->route("admin.settings.index")
        ]);

        $settings = [];

        if(config('tomato-settings.settings.seo')){
            $settings[] = SettingHold::make()
                ->label(__('SEO Settings'))
                ->icon('bx bx-search')
                ->route('admin.settings.seo.index')
                ->description(__('Name, Logo, Site Profile'))
                ->group(__('General'));
        }
        if(config('tomato-settings.settings.interface')){
            $settings[] = SettingHold::make()
                ->label(__('Interface Settings'))
                ->icon('bx bx-globe')
                ->route('admin.settings.site.index')
                ->description(__('Site Menu, Site Social Media links, etc.'))
                ->group(__('General'));
        }
        if (config('tomato-settings.settings.location')) {
            $settings[] = SettingHold::make()
                ->label(__('Location Settings'))
                ->icon('bx bx-map')
                ->route('admin.settings.local.index')
                ->description(__('Contacts, Country, Language, Currency, etc.'))
                ->group(__('General'));
        }
        if (config('tomato-settings.settings.email')) {
            $settings[] = SettingHold::make()
                ->label(__('Email SMTP Services'))
                ->icon('bx bx-envelope')
                ->route('admin.settings.email.index')
                ->description(__('SMTP, Sender, etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.google')) {
            $settings[] = SettingHold::make()
                ->label(__('Google Services'))
                ->icon('bx bxl-google')
                ->color('#e43e2a')
                ->route('admin.settings.google.index')
                ->description(__('Google API Key, Google Cloud Key, etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.firebase')) {
            $settings[] = SettingHold::make()
                ->label(__('Google Firebase'))
                ->color('#feca2c')
                ->icon('bx bxl-firebase')
                ->route('admin.settings.google-firebase.index')
                ->description(__('Google Firebase JSON, Google Cloud Messaging.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.reCap')) {
            $settings[] = SettingHold::make()
                ->label(__('Google reCAPTCHA'))
                ->icon('https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/RecaptchaLogo.svg/2048px-RecaptchaLogo.svg.png')
                ->route('admin.settings.google-recap.index')
                ->description(__('Google reCAPTCHA Key, etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.payment')) {
            $settings[] = SettingHold::make()
                ->label(__('Payment Gateway'))
                ->icon('bx bx-credit-card')
                ->route('admin.settings.payments.index')
                ->description(__('Active Payment Gate, Select Default one, etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.facebook')) {
            $settings[] = SettingHold::make()
                ->label(__('Facebook Services'))
                ->color('#0169e4')
                ->icon('bx bxl-meta')
                ->route('admin.settings.services-facebook.index')
                ->description(__('Meta Pixcel, Facebook Chat Box, Facebook App, etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.addThis')) {
            $settings[] = SettingHold::make()
                ->label(__('AddThis Services'))
                ->icon('https://upload.wikimedia.org/wikipedia/commons/1/1d/AddThis_logo.png')
                ->route('admin.settings.services-addthis.index')
                ->description(__('Link addThis with API, etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.sms')) {
            $settings[] = SettingHold::make()
                ->label(__('SMS Gates Services'))
                ->icon('bx bxs-megaphone')
                ->route('admin.settings.services-sms.index')
                ->description(__('Link any SMS gate with API,MessageBird, Twilo etc.'))
                ->group(__('Services'));
        }
        if (config('tomato-settings.settings.shipping')) {
            $settings[] = SettingHold::make()
                ->label(__('Shipping Gates Services'))
                ->icon('bx bxs-truck')
                ->route('admin.settings.services-shipping.index')
                ->description(__('Link shipping gateway with API,DHL, Posta etc.'))
                ->group(__('Services'));
        }


        TomatoSettings::register($settings);
    }

    /**
     * @return void
     */
    public function registerPermissions(): void
    {
        if(class_exists(TomatoRoles::class)){
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
