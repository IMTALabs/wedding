<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\IBaseRepository;
use App\Repositories\UserRepositories\IUserRepository;
use App\Repositories\UserRepositories\UserRepository;
use App\Repositories\WeddingRepositories\IWeddingRepository;
use App\Repositories\WeddingRepositories\WeddingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IWeddingRepository::class, WeddingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
