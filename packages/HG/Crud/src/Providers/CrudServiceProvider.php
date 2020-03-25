<?php

namespace HG\Crud\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__ . '/../Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'crud');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'crud');

        Event::listen('bagisto.admin.layout.head', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('crud::layouts.style');
        });

        $this->loadMigrationsFrom('/../Database/Migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        );
    }
}
