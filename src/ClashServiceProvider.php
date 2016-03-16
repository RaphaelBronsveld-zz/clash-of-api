<?php

/*
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi;

use Illuminate\Support\ServiceProvider;

class ClashServiceProvider extends ServiceProvider
{
    public function boot() {

        include __DIR__.'/routes.php';

        $this->loadViewsFrom(__DIR__.'/views', 'clashofapi');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/raphaelb/clashofapi'),
            __DIR__.'/config/clash.php' => config_path('clash.php')
        ]);
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Raphaelb\ClashOfApi\ClashOfClansController');

        $this->app->bind('clash', 'Raphaelb\ClashOfApi\Clash');

    }
}