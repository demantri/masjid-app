<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\App\Contracts\KasMasukContract::class, \App\Services\KasMasukService::class);    
        $this->app->singleton(\App\Contracts\KasKeluarContract::class, \App\Services\KasKeluarService::class);    
    }
}
