<?php

namespace CodingFoundry\LaravelUI;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class UIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('tailwind-vue', function (UiCommand $command) {
            Preset::installTailwindVue();
            $command->info('Laravel UI Tailwind CSS & Vue Frameworks deployed');
        });

        UiCommand::macro('tailwind-vue-auth', function (UiCommand $command) {
            Preset::installTailwindVueAuth();
            $command->info('Laravel UI Tailwind CSS & Vue Frameworks with Auth deployed');
        });

        UiCommand::macro('tailwind', function (UiCommand $command) {
            Preset::installTailwind();
            $command->info('Laravel UI Tailwind CSS deployed');
        });
    }
}
