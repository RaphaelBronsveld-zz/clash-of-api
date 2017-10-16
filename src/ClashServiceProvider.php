<?php
/**
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
    public function boot()
    {
        $this->registerHelpers();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('clash', 'Raphaelb\ClashOfApi\Clash');
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        include_once __DIR__ . DIRECTORY_SEPARATOR. 'helpers.php';
    }
}
