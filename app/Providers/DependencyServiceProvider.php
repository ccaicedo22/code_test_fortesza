<?php

namespace App\Providers;

use App\Http\Contracts\MessageRepositoryContract;
use App\Http\Controllers\Message\MessageShowController;
use App\Http\Controllers\Message\MessageSendController;
use App\Http\Controllers\Message\MessageSendFileController;
use App\Http\Repositories\MessageRepository;
use Illuminate\Support\ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app
            ->when(MessageShowController::class)
            ->needs(MessageRepositoryContract::class)
            ->give(MessageRepository::class);


        $this->app
            ->when(MessageSendController::class)
            ->needs(MessageRepositoryContract::class)
            ->give(MessageRepository::class);


        $this->app
            ->when(MessageSendFileController::class)
            ->needs(MessageRepositoryContract::class)
            ->give(MessageRepository::class);
    }
}
