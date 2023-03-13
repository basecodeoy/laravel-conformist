<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\View\ViewServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use PreemStudio\Conformist\ServiceProvider;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelDataServiceProvider::class,
            ViewServiceProvider::class,
            ServiceProvider::class,
        ];
    }
}
