<?php
/**
 * This file is part of the Clash Of API package.
 *
 * Raphael Bronsveld <raphaelbronsveld@outlook.com>
 *
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphaelb\ClashOfApi\Facades;

use Illuminate\Support\Facades\Facade;

class Clash extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'clash';
    }
}
