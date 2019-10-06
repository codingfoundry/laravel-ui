<?php

namespace CodingFoundry\LaravelUI;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset as UIPreset;

class Preset extends UIPreset
{
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
        static::updateStyles();
        static::updateSass();
        static::updateTailwindConfig();
        static::updateComponent();
    }

    public static function installTailwind()
    {
        static::install();
    }

    public static function installTailwindVue()
    {
        static::install();
    }

    public static function installTailwindVueAuth()
    {
        static::install();
        static::scaffoldAuth();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                'laravel-mix' => '^5.x',
                'laravel-mix-purgecss' => '^4.x',
                'laravel-mix-tailwind' => '^0.1.x',
                'tailwindcss' => '^1.x',
                'resolve-url-loader' => '2.3.1',
                'sass' => '^1.20.1',
                'sass-loader' => '7.*',
                'vue' => '^2.5.17',
                'vue-template-compiler' => '^2.6.10',
            ],
            Arr::except($packages, [
                'popper.js',
                'lodash',
                'jquery',
                'bootstrap'
            ])
        );
    }

    public static function updateMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    public static function updateTailwindConfig()
    {
        copy(__DIR__.'/stubs/tailwind.config.js', base_path('tailwind.config.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/Example.js')
        );
        copy(
            __DIR__.'/stubs/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
    }

    public static function updateStyles()
    {
        File::cleanDirectory(resource_path('sass'));
        File::put(resource_path('sass/app.scss'), '');
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        copy(__DIR__ . '/stubs/app.scss', resource_path('sass/app.scss'));
    }

    protected static function scaffoldAuth()
    {
//        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
//        file_put_contents(
//            base_path('routes/web.php'),
//            "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
//            FILE_APPEND
//        );
        copy(__DIR__.'/stubs/Auth/login.blade.php', resource_path('/views/auth/login.blade.php'));
        copy(__DIR__.'/stubs/Auth/register.blade.php', resource_path('/views/auth/register.blade.php'));
        copy(__DIR__.'/stubs/Auth/verify.blade.php', resource_path('/views/auth/verify.blade.php'));
        copy(__DIR__.'/stubs/Auth/email.blade.php', resource_path('/views/auth/passwords/email.blade.php'));
        copy(__DIR__.'/stubs/Auth/reset.blade.php', resource_path('/views/auth/passwords/reset.blade.php'));
        copy(__DIR__.'/stubs/Auth/auth.blade.php', resource_path('/views/layouts/auth.blade.php'));
        copy(__DIR__.'/stubs/app.blade.php', resource_path('/views/layouts/app.blade.php'));
        copy(__DIR__.'/stubs/home.blade.php', resource_path('/views/home.blade.php'));
        copy(__DIR__.'/stubs/welcome.blade.php', resource_path('/views/welcome.blade.php'));
    }

}
