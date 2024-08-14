<?php

namespace App\Providers;

use App\Repository\AssignmentRepository\DocumentRepository;
use App\Repository\AssignmentRepository\Interface\DocumentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use function Psy\bin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DocumentRepositoryInterface::class, DocumentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
