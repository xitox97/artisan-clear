<?php

namespace Xitox\Commands;

use Illuminate\Console\Command;

class LogClearCommand extends Command
{
    public $signature = 'log:clear';

    public $description = 'Clear the laravel log file';

    public function handle()
    {
        file_put_contents(storage_path('logs/laravel.log'), "");
        $this->info('Application log cleared!');
    }
}
