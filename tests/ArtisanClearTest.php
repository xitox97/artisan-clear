<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Xitox\ArtisanClearServiceProvider;
use Illuminate\Support\Facades\Artisan;

class ArtisanClearTest extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ArtisanClearServiceProvider::class,
        ];
    }

    /** @test */
    public function it_display_output_text()
    {
        $this->artisan('log:clear')
        ->expectsOutput('Application log cleared!')
        ->assertExitCode(0);
    }

    /** @test */
    public function it_clear_laravel_log_files()
    {
        file_put_contents(storage_path('logs/laravel.log'), "test");

        $this->assertTrue(
            !empty(file_get_contents(storage_path('/logs/laravel.log')))
        );

        Artisan::call('log:clear');

        $this->assertTrue(
            empty(file_get_contents(storage_path('/logs/laravel.log')))
        );
    }
}
