<?php

namespace Xitox;

use Illuminate\Support\ServiceProvider;
use Xitox\Commands\LogClearCommand;

class ArtisanClearServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                LogClearCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
