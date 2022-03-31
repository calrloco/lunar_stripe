<?php

namespace Tests;

use Cartalyst\Converter\Laravel\ConverterServiceProvider;
use GetCandy\GetCandyServiceProvider;
use GetCandy\Stripe\StripePaymentsServiceProvider;
use GetCandy\Tests\Stubs\User;
use Illuminate\Support\Facades\Config;
use Kalnoy\Nestedset\NestedSetServiceProvider;
use Livewire\LivewireServiceProvider;
use Spatie\Activitylog\ActivitylogServiceProvider;
use Spatie\MediaLibrary\MediaLibraryServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
        Config::set('providers.users.model', User::class);

        activity()->disableLogging();
    }

    protected function getPackageProviders($app)
    {
        return [
            GetCandyServiceProvider::class,
            StripePaymentsServiceProvider::class,
            LivewireServiceProvider::class,
            MediaLibraryServiceProvider::class,
            ActivitylogServiceProvider::class,
            ConverterServiceProvider::class,
            NestedSetServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }

    /**
     * Define database migrations.
     *
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}