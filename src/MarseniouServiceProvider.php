<?php

namespace Marseniou\BulmaPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Marseniou\Preset;
class MarseniouServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('bulma', function (UiCommand $command) {
            Preset::install();
        });
    }
}
