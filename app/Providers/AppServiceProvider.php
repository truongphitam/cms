<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use View, DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('current_locale', LaravelLocalization::getCurrentLocale());
        //View::share('current_locale', 'vi');
        View::share('supported_locales', LaravelLocalization::getSupportedLocales());

        Blade::directive('e', function ($expression) {
            list($textVi, $textEn) = explode(';', str_replace(['(', ')', "'"], '', $expression));
            $text = '[:vi]' . $textVi . '[:en]' . $textEn . '[:]';
            return "<?php echo getLocaleValue('$text', \$current_locale); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() === 'local') {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
