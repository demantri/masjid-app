<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\App\Contracts\ArusKas\KasMasukContract::class, \App\Services\ArusKas\KasMasukService::class);    
        $this->app->singleton(\App\Contracts\ArusKas\KasKeluarContract::class, \App\Services\ArusKas\KasKeluarService::class);    
    }
}
