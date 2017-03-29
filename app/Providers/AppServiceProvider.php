<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View, App\Setting, App\Bank;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if (php_sapi_name() != 'cli') {
            foreach (Setting::all() as $setting) {
                $this->app->bind($setting->settingName, function() use ($setting) {
                    return $setting->settingValue;
                });
            }
            $bank = Bank::select();
            $this->app->bind('bankAccount', function() use ($bank) {
                return implode("<p>",$bank);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::addNamespace('theme', [
            config('theme.path'),
            app_path().'/views'
        ]);
        
    }
}
