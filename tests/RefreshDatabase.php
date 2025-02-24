<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase as BaseRefreshDatabase;
use Illuminate\Support\Facades\Artisan;

trait RefreshDatabase
{
    use BaseRefreshDatabase;

    public function refreshTestDatabase()
    {
        Artisan::call('migrate:fresh');
    }
}
